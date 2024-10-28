<?php

namespace App\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Review extends Component
{
    use WithFileUploads;
    public $images = Array();
    public $review_text = "";
    public $rating = 5;
    public $pid;
    public function submit_review_data($pid){
        $this->pid = $pid;
        DB::table('review')->insert(['review_text'=>$this->review_text , 'pid'=>$pid , 'rating'=>$this->rating]);
    }

    public function render()
    {
        $data = DB::table('review')->where('pid',$this->pid)->select('review_text','rating')->orderby('added_on')->get();
        return view('livewire.review',['data'=>$data]);
    }
}