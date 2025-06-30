<?php

namespace App\Livewire;

use Livewire\Component;
use App\Events\OrderStatusChanged;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class Notifications extends Component
{
    var $notifications = [];
    var $sender_id;
    var $count = 0;
    
    public function mount() {
        $this->sender_id = Auth::id();
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