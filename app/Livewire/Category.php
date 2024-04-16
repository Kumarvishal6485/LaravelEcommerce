<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Category extends Component
{
    public $id;
    public $data_type;
    public function render()
    {
        if($this->id != 0){ // fetch sub category
            $data = DB::table('sub_category')->where(array('category'=>$this->id))->select('id','sub_category','image')->limit(8)->get();
        }
        else{ // fetch category
            $data = DB::table('category')->select('id','category','image')->limit(8)->get();
        }
        return view('livewire.category',array('data'=>$data , 'type' => $this->data_type , 'id'=>$this->id));
    }
}
