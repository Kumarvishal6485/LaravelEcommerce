<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class admin extends Controller
{
    function fetch_categories(Request $r){
        $data = DB::table('category')->paginate(10);
        $data = DB::table('category')->get();
        return view('admin.categories',array('data' => $data));
    }

    function user(Request $r){
        if(!$r->session()->has('username')){
            return redirect('admin/login');
        }
        return view('admin/index');
    }

    function add_category(Request $r){
        $file = $r->file('image');
        $image = $file->getClientOriginalName();
        DB::table('category')->insert(array('category' => $r->category , 'image' => $image , 'description' => $r->description));
        $file->move('storage',$file->getClientOriginalName());
        return redirect('admin/categories');
    }

    public static function edit_categories_details(Request $r){
        $id = $r->id;
        $data = DB::table('category')->where(array('id'=>$id))->get();
        return response()->json($data);
    }

    function edit_category(Request $r){
        $prev_image = $r->prev_image;
        $id = $r->id;
        if($r->hasFile('image')){
            $file = $r->file('image');
            $image = $file->getClientOriginalName();
            DB::table('category')->where(array('id' => $id))->update(array('category' => $r->category , 'image' => $image , 'description' => $r->description));
            $file->move('storage',$file->getClientOriginalName());
            File::delete('storage/'.$prev_image);
        }
        else{
            DB::table('category')->where(array('id' => $id))->update(array('category' => $r->category , 'description' => $r->description));
        }
        return redirect('admin/categories');
    }

    function remove_category(Request $r){
        $image = DB::table('category')->where(array('id'=>$r->id))->select('image')->get();
        $data = json_decode($image);
        File::delete('storage/'.$data[0]->image);
        DB::table('category')->where(array('id'=>$r->id))->delete();
        return redirect('admin/categories');
    }

    function get_users(Request $r){
        $data = DB::table('admin')->get();
        return view('admin/users',array('data'=>$data));
    }

    function status(Request $r){
        $id = $r->id;
        $status = !$r->status;
        DB::table('admin')->where(array('id'=>$id))->update(array('active_status'=>$status));
        $data = DB::table('admin')->get();
        return view('admin/users',array('data'=>$data));
    }

    function delete_user(Request $r){
        $id = $r->id;
        DB::table('admin')->where(array('id'=>$id))->delete();
        $data = DB::table('admin')->get();
        return view('admin/users',array('data'=>$data));
    }

    function get_subcategory(Request $r){
        $data = DB::table('sub_category')->join('category','category.id','=','sub_category.category')->select('category.category','sub_category.id','sub_category.sub_category')->get();
        return view('admin/sub_categories',array('data'=>$data));
    }

    public static function get_categories(Request $r){
        $data = DB::table('category')->get(array('id','category'));
        return response()->json($data);
    }

    function add_sub_category(Request $r){
        $file = $r->file('image');
        $image = $file->getClientOriginalName();
        DB::table('sub_category')->insert(array('category'=>$r->category,'sub_category'=>$r->sub_category,'image'=>$image,'description'=>$r->description));
        $file->move('storage/sub_category/',$image);
        return redirect('admin/sub_categories');
    }

    function remove_sub_category(Request $r){
        $id = $r->id;
        $images = DB::table('sub_category')->where(array('id'=>$id))->select('image')->get();
        $images = json_decode($images);
        File::delete('storage/sub_category/'.$images[0]->image);
        DB::table('sub_category')->where(array('id'=>$id))->delete();
        return redirect('admin/sub_categories');
    }

    function get_products(Request $r){
        $data = DB::table('product')->join('category','category.id','=','product.cid')->join('sub_category','sub_category.id','=','product.sid')->select('category.category','sub_category.sub_category','product.id','product.product_name','product.status')->get();
        return view('admin/products',array('data'=>$data));
    }

    public static function get_sub_categories(Request $r){
        $id = $r->id;
        $data = DB::table('sub_category')->where(array('category'=>$id))->select('id','sub_category')->get();
        return response()->json($data);
    }

    function add_product(Request $r){
        $status = 1;
        DB::table('product')->insert(array('cid'=>$r->category , 'sid'=>$r->sub_category , 'product_name'=>$r->product_name,'description'=>$r->description,'status'=>$status));
        $id = DB::table('product')->get()->max('id');
        $images = $r->file('image');
        foreach($images as $image){
            $image_name = $image->getClientOriginalName();
            $image->move('storage/products/',$image_name);
        }

        foreach($images as $image){
            $image_name = $image->getClientOriginalName();
            DB::table('images')->insert(array('pid'=>$id , 'image'=>$image_name));    
        }
        return redirect('admin/products');
    }

    function delete_product(Request $r){
        $id = $r->id;
        DB::table('product')->where(array('id'=>$id))->delete();
        return redirect('admin/products');
    }

    public static function fetch_sub_category_edit_details(Request $r){
        $id = $r->id;
        $categories = DB::table('category')->select('category','id')->get();
        $data = DB::table('sub_category')->where(array('id'=>$id))->get();
        return response()->json(array('sub_category'=>$data , 'category'=>$categories));
    }

    function edit_sub_category(Request $r){
        $prev_image = $r->prev_image;
        $id = $r->sub_category_id;
        if($r->hasFile('image')){
            $file = $r->file('image');
            $image = $file->getClientOriginalName();
            $images = DB::table('sub_category')->where(array('id'=>$id))->select('image')->get();
            DB::table('sub_category')->where(array('id' => $id))->update(array('category' => $r->category , 'image' => $image , 'description' => $r->description , 'sub_category'=>$r->sub_category));
            $file->move('storage/sub_category/',$image);
            $images = json_decode($images);
            File::delete('storage/sub_category/'.$images[0]->image);
        }
        else{
            DB::table('sub_category')->where(array('id' => $id))->update(array('category' => $r->category , 'description' => $r->description , 'sub_category'=>$r->sub_category));
        }
        return redirect('admin/sub_categories');
    }

    public static function product_edit_details(Request $r){
        $id = $r->id;
        $data = DB::table('product')->where(array('id'=>$id))->get();
        $images = DB::table('images')->where(array('pid'=>$id))->get();
        return response()->json(array('data'=>$data,'images'=>$images));
    }

    public static function delete_product_image(Request $r){
        $id = $r->id;
        $pid = $r->pid;
        $image = DB::table('images')->where(array('id'=>$id))->select('image')->get();
        DB::table('images')->where(array('id'=>$id,'pid'=>$pid))->delete();
        File::delete('storage/products/'.$image[0]->image);
        $images = DB::table('images')->where(array('pid'=>$pid))->get();
        return response()->json(array('images'=>$images));
    }

    function edit_product_details(Request $r){
        if($r->hasFile('image')){
            $images = $r->file('image');
            foreach($images as $image){
                $image_name = $image->getClientOriginalName();
                $image->move('storage/products/',$image_name);
                DB::table('images')->insert(array('pid'=>$r->product_id,'image'=>$image_name));
            }
            DB::table('product')->where(array('cid'=>$r->prev_category_id,'id'=>$r->product_id,'sid'=>$r->prev_sub_category_id))->update(array('cid'=>$r->category,'sid'=>$r->sub_category,'product_name'=>$r->product_name,'description'=>$r->description));
        }
        else{
            DB::table('product')->where(array('cid'=>$r->prev_category_id,'id'=>$r->product_id,'sid'=>$r->prev_sub_category_id))->update(array('cid'=>$r->category,'sid'=>$r->sub_category,'product_name'=>$r->product_name,'description'=>$r->description));
        }
        return redirect('admin/products');   
    }
}