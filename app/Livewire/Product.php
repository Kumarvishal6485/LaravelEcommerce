<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Product extends Component
{
    public function render()
    {
        $data = DB::table('product')->join('category','category.id','=','product.cid')->join('sub_category','sub_category.id','=','product.sid')->select('category.category','sub_category.sub_category','product.id','product.product_name','product.status')->limit(8)->get();
        return view('livewire.product',array('data'=>$data));
    }
}
