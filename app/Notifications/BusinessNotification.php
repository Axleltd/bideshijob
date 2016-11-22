<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use App\Company;

class BusinessNotification extends Notification
{
    use Queueable;
    protected $msg;
    protected $company;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($msg,Company $company)
    {
        $this->msg = $msg;
        $this->company=$company;
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
                    ->subject('Notify')
                    ->level($this->company->logo)
                    ->greeting($this->company->name)
                    ->line('Your Company Notification')
                    ->action('Your Company', url('/company'))
                    ->line($this->msg);

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
