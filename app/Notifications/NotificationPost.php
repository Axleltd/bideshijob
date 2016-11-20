<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotificationPost extends Notification implements ShouldQueue
{
    use Queueable;

    protected $notify;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notify)
    {
        $this->notify = $notify;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $notifiable->prefers_sms ? ['sms'] : ['mail', 'database'];
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
                    ->subject('New Notification')
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', 'https://laravel.com')
                    ->line('Thank you for using our application!');
    }

      public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
            ->from(123456789)
            ->content('New post on Laravel News!');
    }

        public function toDatabase($notifiable)
    {
        return new DatabaseMessage([
            'message' => 'A new post was published on Laravel News.',
            'action' => url($this->notify->slug)
        ]);
    }
}
