<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Mpeke_notify extends Notification
{
    use Queueable;
    private $Mpeke_Data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Mpeke_Data)
    {
        //
        $this->Mpeke_Data = $Mpeke_Data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');
        return (new MailMessage)
                    ->greeting($this->Mpeke_Data['name'])
                    ->line($this->Mpeke_Data['statement'])
                    ->line($this->Mpeke_Data['body'])
                    ->action($this->Mpeke_Data['offerText'], $this->Mpeke_Data['actionURL']);
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
            'data' => $this->Mpeke_Data['body']
        ];
    }
}
