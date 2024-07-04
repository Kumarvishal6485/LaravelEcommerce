<?php
use Illuminate\Support\Facades\Route;
use App\http\controllers\admin;
use App\http\controllers\Export;
use App\http\controllers\login;
use App\http\controllers\product;
use livewire\livewire;

//admin panel routes starts from here
Route::get('admin',[login::class,'login']);
Route::post('check_user',[login::class,'check_admin']);
Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/logout',[login::class,'logout']);
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
    Route::view('admin/attributes','admin/attributes');
});
//admin panel routes ends here

//website route starts
Route::get('/googlelogin',[login::class,'googlelogin']);
Route::get('/auth/google/callback',[login::class,'googleLoginHandler']);
Route::post('/check_users',[login::class,'check_users']);
Route::get('/logout',[login::class,'logout_user']);
Route::view('/','index');
Route::get('/sub_categories/{id}',function($id){
    return view('sub_categories',array('id'=>$id));
});
Route::get('/product/{pid}',[product::class,'get_product']);
Route::get('products/{cid}/{sid}',function($category,$sub_category){
    return view('products',array('cid'=> $category , 'sid' => $sub_category));
});

Route::get('/products',function($category=0,$sub_category=0){
    return view('products',array('cid'=> $category , 'sid' => $sub_category));
});

Route::view('/cart','cart');
Route::view('buy','buy');
//website route ends
