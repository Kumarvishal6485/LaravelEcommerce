<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
class Getuser extends Component
{
    public $attribute_id;
    public function render()
    {
        $data = DB::table('attribute_values')->where(['attribute_id'=>$this->attribute_id])->get();
        return view('livewire.getuser',array('data' => $data));
    }
}
