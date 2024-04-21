<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class product extends Controller
{
    function get_product(Request $r){
        $data = DB::table('product')->join('category','category.id','=','product.cid')->join('sub_category','sub_category.id','=','product.sid')->select('category.category','sub_category.sub_category','product.id','product.product_name','product.sid','product.cid','product.status','product.price','product.cost','product.description')->where(array('product.id'=>$r->pid))->get();
        $images = DB::table('images')->where(array('pid'=>$r->pid))->pluck('image');
        return view('/product',array('data'=>$data,'images'=>$images));
    }
}
