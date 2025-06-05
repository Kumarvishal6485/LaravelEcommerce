<?php

namespace App\Livewire;

use Livewire\Component;
use App\Events\OrderStatusChanged;
use Livewire\Attributes\On;
use App\Events\MessageSent;

class Orderstatus extends Component
{
    var $status;
    var $order_id;
    var $user_id;
    var $orderStatuses = ["Order Placed","Cancelled","Shipped","Out For Delivery","Delivered"];
    var $sender_id = "";
    var $receiver_id;

    public function mount($status, $order_id, $user_id)
    {
        $this->status = $status;
        $this->order_id = $order_id;
        $this->user_id = $user_id;
        $this->sender_id = session('user_id');
        $this->receiver_id = 12;
    }

    public function statusChanged($index)
    {
        $this->status = $this->orderStatuses[$index];
        $status_notif = [
            "order_status" => $this->status,
            "receiver_id" => $this->user_id,
            "sender_id" => $this->sender_id,
            "order_id" => $this->order_id,
            "message" => $this->status
        ];
        event(new OrderStatusChanged($status_notif));
    }

    #[On('echo-private:msg-received.{sender_id},MessageSent')]
    public function listen($data)
    {
        $this->messages = [...$this->messages, $data->notifData['message']];
    }

    public function render()
    {
        return view('livewire.orderstatus');
    }
}
