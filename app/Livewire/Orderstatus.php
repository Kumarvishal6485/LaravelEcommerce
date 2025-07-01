<?php

namespace App\Livewire;

use Livewire\Component;
use App\Events\OrderStatusChanged;
use Livewire\Attributes\On;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\XmlStatusParser;

class Orderstatus extends Component
{
    var $status;
    var $order_id;
    var $user_id;
    var $orderStatuses = ["Order Placed","Cancelled","Shipped","Out For Delivery","Delivered"];
    var $sender_id = "";
    var $receiver_id;
    var $messages = [];
    var $statusXml;
    public function mount($status, $order_id, $user_id)
    {
        $this->statusXml = $status;
        $this->status = $this->getStatusDetail($status);
        $this->order_id = $order_id;
        $this->user_id = $user_id;
        $this->sender_id = Auth::id();
    }

    private function getStatusDetail($status) {
        $parsedStatusData = XmlStatusParser::parser($status);
        if ($parsedStatusData) {
            $data = array_pop($parsedStatusData);
            return $data['status'];
        }
        return "";
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
        $this->statusXml = XmlStatusParser::updateXml($this->statusXml, $this->status);
        DB::table('orders')->where(['id' => $this->order_id])->update(['order_status' => $this->statusXml]);
        event(new OrderStatusChanged($status_notif));
    }

    public function getListeners()
    {
        if (Auth::check()) {
            $sender_id = Auth::id();
            return [
                "echo-private:msg-received.{$sender_id},MessageSent" => 'listen'
            ];
        }
        return [];
    }

    public function listen($data)
    {
        $this->messages = [...$this->messages, $data['message']['message']];
    }

    public function render()
    {
        return view('livewire.orderstatus');
    }
}