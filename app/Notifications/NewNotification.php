<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewNotification extends Notification
{
    use Queueable;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['database']; // Specify database channel
    }

    public function toArray($notifiable)
    {
        return [
            'order_number'=> $this->order->order_number,
            'order_id' => $this->order->id,
            'status' => 'pending',
            'user'=> $this->order->user->name,
            'created_at' => $this->order->created_at->toDateTimeString(),
            'message' => 'New Order :)!',
        ];
    }
}
