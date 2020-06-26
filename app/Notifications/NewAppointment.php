<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;

class NewAppointment extends Notification implements ShouldQueue
{
    use Queueable;
    protected $appointment_date;
    protected $doctor_name;
    protected $location;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($appointment_date, $doctor_name, $location)
    {
       $this->appointment_date = $appointment_date;
       $this->doctor_name = $doctor_name;
       $this->location = $location;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database', OneSignalChannel::class];
    }

    public function toOneSignal($notifiable)
    {
        return OneSignalMessage::create()
            ->subject("Tienes una nueva cita agendada");
           /*  ->body("Click here to see details."); */
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->
        subject('Nueva cita agendada')->
        markdown('mail.appointment.new',
        ["email" => $notifiable->email,
        "name" => $notifiable->name,
        "appointment_date" => $this->appointment_date,
        "doctor_name" => $this->doctor_name,
        "location" => $this->location
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
{
    return [
        "email" => $notifiable->email,
        "name" => $notifiable->name,
        "appointment_date" => $this->appointment_date,
        "doctor_name" => $this->doctor_name,
        "location" => $this->location
    ];
}
}
