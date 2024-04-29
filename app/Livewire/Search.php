<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

class Search extends Component
{
    #[Url()]
    public $search;
    public $data;
    public function mount($search){
        $this->search = $search;
    }

    #[Computed()]
    public function get_result(){
        if($this->search == NULL) return NULL;
        $this->data = DB::table('product')->where('product_name','like',"%{$this->search}%")->select('id','product_name')->get();
        return $this->data;
    }
    public function render()
    {
        if($this->search == ""){
            return view('livewire.search',['data'=>NULL]);
        }
        return view('livewire.search',[]);
    }
}
