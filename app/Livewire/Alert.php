<?php

namespace App\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Alert extends Component
{
    use LivewireAlert;
    public $msg = "";
    public $type = "";

    public function alert_message($msg, $type)
    {
        $this->alert($type, $msg, [
            'position' => 'top-end',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        $this->alert_message($this->msg,$this->type);
        return view('livewire.alert');
    }
}
