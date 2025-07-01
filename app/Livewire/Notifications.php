<?php

namespace App\Livewire;

use Livewire\Component;
use App\Events\OrderStatusChanged;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class Notifications extends Component
{
    var $notifications = [];
    var $sender_id;
    var $count = 0;
    
    public function mount() {
        $this->sender_id = Auth::id();
        $this->notifications = DB::table('notifications')->where(['receiver' => Auth::id()])->select('message','order_id')->orderby('created_on','desc')->get()->map(function($item){
            return (array) $item;
        })->toArray();
    }

    public function getListeners()
    {
        if (Auth::check()) {
            $sender_id = Auth::id();
            return [
                "echo-private:order-status-change.{$sender_id},OrderStatusChanged" => 'listen'
            ];
        }

        return [];
    }

    public function listen($data)
    {
        $this->count = count($this->notifications) + 1;
        $this->notifications = [...$this->notifications,$data['notifData']];
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}