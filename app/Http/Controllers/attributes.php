<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class attributes extends Controller
{
    function addAttribute(Request $r)
    {
        DB::table('attributes')->insert(['attribute'=>$r->attribute]);
        $r->session()->flash("message","Attribute Added Successfully");
        return redirect('admin/attributes');
    }

    function fetchAttributes(Request $r)
    {
        $data = DB::table('attributes')->select('id','attribute')->get(); 
        return view('admin/attributes',['data'=>$data]);
    }

    function removeAttributeValue(Request $r) 
    {
        DB::table('attribute_values')->where(['id'=>$r->id])->delete();
        return redirect('admin/attributes');
    }
}