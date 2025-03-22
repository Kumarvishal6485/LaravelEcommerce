<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AttValue extends Component
{
    public $att_id = NULL;
    public $att_val = NULL;
    public function addValue() {
        if ($this->att_val) {
            DB::table('attribute_values')->insert(['value'=> $this->att_val , 'attribute_id'=> $this->att_id]);
        }
    }

    public function render()
    {
        $data = DB::table('attribute_values')->where('attribute_id',$this->att_id)->select('id','value','attribute_id')->get();
        return view('livewire.att-value', ['data' => $data,'att_id'=>$this->att_id]);
    }
}