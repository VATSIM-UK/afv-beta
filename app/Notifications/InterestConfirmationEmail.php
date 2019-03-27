<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class InterestConfirmationEmail extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('AFV Voice Beta - Request Confirmation')
            ->greeting("Hello, $notifiable->name_first!")
            ->line('This email is to confirm your expression of interest in the AFV Voice Beta')
            ->line('Thank you for the interest in the beta program - 
                                    you should receive a follow-up email soon if you have been selected');
    }
}
