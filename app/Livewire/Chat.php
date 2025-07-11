<?php

namespace App\Livewire;

use Livewire\Component;
use App\Events\MessageSent;
use Livewire\Attributes\On;
// use App\Events\OrderStatusChanged;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    var $message = "";
    var $order_id = "";
    var $messages = [];
    var $sender_id = "";
    var $receiver_id = "";

    public function mount($order_id)
    {
        $this->order_id = $order_id;
        $this->sender_id = Auth::id();
        $this->receiver_id = 3;
    }

    public function sendMessage()
    {
        $this->messages[] = $this->message;
        $new_message = [
            'message' => $this->message,
            'order_id' => $this->order_id,
            'sender_id' => $this->sender_id,
            'receiver_id' => $this->receiver_id
        ];
        event(new MessageSent($new_message));
        $this->message = "";
    }

    // #[On('echo-private:order-status-change.{sender_id},OrderStatusChanged')]
    // public function listen($data)
    // {
    //     $this->messages = [...$this->messages,$data['notifData']['message']];
    // }

    public function render()
    {
        return view('livewire.chat');
    }
}