<?php

namespace App\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Image extends Component
{
    public $pid;
    public function render()
    {
        $image = DB::table('images')->where(array('pid'=>$this->pid))->select('image')->limit(1)->get();
        return view('livewire.image',array('image'=>$image));
    }
}
