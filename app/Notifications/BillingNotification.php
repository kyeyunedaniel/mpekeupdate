<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BillingNotification extends Notification
{
    use Queueable;
    private $billData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     public function __construct($billData)
    {
        $this->billData = $billData;
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
        return (new MailMessage)
                    ->name($this->billData['name'])
                    ->line($this->billData['body'])
                    // ->action($this->billData['text'], $this->billData['url'])
                    ->line($this->billData['thanks']);
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
            'order_id' => $this->billData['order_id']
            //
        ];
    }
}
