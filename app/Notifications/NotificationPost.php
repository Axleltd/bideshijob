<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotificationPost extends Notification implements ShouldQueue
{
    use Queueable;

    protected $message,$url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    // public function __construct(Company $notify)
    // {
    //     $this->notify = $notify;
    // }
    public function __construct($message,$url)
    {
        $this->message = $message;
        $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->subject('Bideshi Kaam Email')
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', 'https://www.bideshikaam.com')
                    ->line('Thank you for using our application!');
    }   

    public function toArray()
    {
        return [
        'message'=>$this->message,
        'url'=>$this->url];
    } 

}
