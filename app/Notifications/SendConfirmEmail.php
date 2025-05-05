<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendConfirmEmail extends Notification
{
    use Queueable;
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(' اتمام عملية التحقق من بيانات الشركة بنجاح  ')
            ->greeting('مرحبا! ' . $this->user->name)
            ->line('تم اتمام عملية التحقق من بيانات الشركة بنجاح')
            ->line(' مرحبا بكم ! ');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'تم اتمام عملية التحقق من بيانات الشركة بنجاح',
            'user' => $this->user,
        ];
    }
}
