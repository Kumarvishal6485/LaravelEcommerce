<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\exportProductList;
use Excel;

class Export extends Controller
{
    function exports(Request $r){
        return Excel::download(new exportProductList,'product.xlsx'); 
    }    
}
