<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrder extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $order_id;
    public function __construct($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line(' لديك طلب جديد علي الموقع الالكتروني  ')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order_id,
            'title' => ' طلب جديد علي الموقع الالكتروني ::  ',
            'url' => url('admin/order/update/' . $this->order_id),
        ];
    }

    public function toBroadcast()
    {
        return [
            'order_id' => $this->order_id,
            'title' => ' طلب جديد علي الموقع الالكتروني ::  ',
            'url' => url('admin/order/update/' . $this->order_id),
        ];
    }

    /////// Change Channel Name
     public function broadcastType()
     {
        return 'App.Models.admin.' . $this->order_id;
     }
}
