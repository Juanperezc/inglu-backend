<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RecoverPassword extends Notification implements ShouldQueue
{
    use Queueable;
    protected $recover_password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($recover_password)
    {
        $this->recover_password = $recover_password;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
        "recover_password" => $this->recover_password
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
            //
        ];
    }
}
