<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\admin;
use App\http\controllers\Export;

//admin panel routes starts from here
Route::get('admin',[admin::class,'login']);
Route::post('check_user',[admin::class,'check_user']);
Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/logout',[admin::class,'logout']);
    Route::get('admin/index',[admin::class,'user']);
    Route::get('admin/categories',[admin::class,'fetch_categories']);
    Route::get('admin/sub_categories',[admin::class,'get_subcategory']);
    Route::get('admin/products',[admin::class,'get_products']);
    Route::get('admin/users',[admin::class,'get_users']);
    Route::POST('admin/add_category',[admin::class,'add_category']);
    Route::get('admin/delete/{id}',[admin::class,'remove_category']);
    Route::POST('admin/fetch_edit_details/',[admin::class,'edit_categories_details']);
    Route::POST('admin/edit_category/',[admin::class,'edit_category']);
    Route::get('admin/status/{id}/{status}',[admin::class,'status']);
    Route::get('admin/delete_user/{id}',[admin::class,'delete_user']);
    Route::post('admin/get_categories',[admin::class,'get_categories']);
    Route::post('admin/add_sub_category',[admin::class,'add_sub_category']);
    Route::get('admin/delete_sub_category/{id}',[admin::class,'remove_sub_category']);
    Route::post('admin/get_sub_categories/',[admin::class,'get_sub_categories']);
    Route::post('admin/add_product/',[admin::class,'add_product']);
    Route::get('admin/delete_product/{id}',[admin::class,'delete_product']);
    Route::post('admin/fetch_sub_category_edit_details',[admin::class,'fetch_sub_category_edit_details']);
    Route::post('admin/edit_sub_category',[admin::class,'edit_sub_category']);
    Route::post('admin/product_edit_details',[admin::class,'product_edit_details']);
    Route::post('admin/delete_product_image',[admin::class,'delete_product_image']);
    Route::post('admin/edit_product_details',[admin::class,'edit_product_details']);
    Route::get('admin/product_export',[Export::class,'exports']);
});
//admin panel routes ends here


//website route starts
Route::view('/','index');
Route::view('categories','categories');
Route::view('product','product');
Route::view('buy','buy');
//website route ends