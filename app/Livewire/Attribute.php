<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
class Attribute extends Component
{
    public $attribute_id;
    public function render()
    {
        $data = DB::table('attribute_values')->where(['id'=>$this->attribute_id])->get();
        return view('livewire.attribute',array('data' => $this->data));
    }
}
