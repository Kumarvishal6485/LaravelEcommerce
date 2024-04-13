<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addCategory extends Controller
{
    function category(Request $r){
        $r->validate(['category'=>'required','image'=>'required|mimes:jpg,jpeg,png','description' => 'required']);
        $category = $r['category'];
        $image = $r->file('image');
        $description = $r['description'];
        DB::table('category')->insert(array('image' => $image , 'category' => $category , 'description' => $description));
        $image->store('storage');
    }
}