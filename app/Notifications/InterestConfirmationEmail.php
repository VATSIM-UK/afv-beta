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
            ->line('Thanks for signing up for the voice beta.  We will be selecting people to load test the new voice infrastructure in stages.')
            ->line('You will receive further information when selected by email - thanks again for your support!')
            ->salutation('Audio For VATSIM Team');
    }
}
