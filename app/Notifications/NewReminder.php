<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use App\Reminder;


class NewReminder extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $reminder_id;
    public function __construct($reminder_id)
    {
        $this->reminder_id = $reminder_id;
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
        return ['database', OneSignalChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function toOneSignal($notifiable)
    {
        $reminder = Reminder::find($this->reminder_id);
        if ($reminder && $reminder->deleted_at == null){
            return OneSignalMessage::create()
            ->subject("Tienes un recordatorio")
            ->body($reminder->title);
        }
           /*  ->body("Click here to see details."); */
    }

    public function toArray($notifiable)
    {
        $reminder = Reminder::find($this->reminder_id);

        if ($reminder && $reminder->deleted_at == null){
            return [
                "email" => $notifiable->email,
                "name" => $notifiable->name,
                "title" => $reminder->title,
                "description" => $reminder->description
            ];
        }
       
      
    }
}
