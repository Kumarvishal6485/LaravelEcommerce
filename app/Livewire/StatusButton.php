<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\XmlStatusParser;

class StatusButton extends Component
{
    var $order_status;
    
    public function mount($order_status) {
        $this->order_status = $order_status;
    }

    private function getStatusDetail() {
        $parsedStatusData = XmlStatusParser::parser($this->order_status);
        if ($parsedStatusData) {
            $data = array_pop($parsedStatusData);
            return $data['status'];
        }
        return "";
    }

    public function render()
    {
        $this->order_status = $this->getStatusDetail();
        return view('livewire.status-button');
    }
}