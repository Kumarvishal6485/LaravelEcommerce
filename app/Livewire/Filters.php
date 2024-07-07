<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Filters extends Component
{
    use LivewireAlert;
    public $user_id;
    public $quantity = NULL;
    public $category;
    public $sub_category;
    public $orderby;
    public $type = "error";
    public $msg = "Can't Proceed Further";
    public $att_values = NULL;
    public $att_id = NULL;
    public $color = NULL;
    public $size = NULL;
    public $att_val_id = NULL;
    public function mount($cid = NULL,$sid = NULL,$orderby = "ASC"){
        $this->category = $cid;
        $this->sub_category = $sid;    
        $this->orderby = $orderby;
    }

    //alert message function code should be present in only one file  
    public function alert_message($msg,$type = "success"){
        $this->alert($type, $msg , [
            'position' => 'top-end',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }


    public function add_to_cart($id = NULL){
        if(session()->has('user_id')){
            $this->user_id = session('user_id');
            $this->quantity = DB::table('cart')->where(array('user_id'=>$this->user_id , 'pid'=>$id))->select('quantity')->get();
            if(!count($this->quantity)){
                $this->quantity = 1;
                $data = DB::table('cart')->insert(array('pid'=>$id,'user_id'=>$this->user_id,'quantity'=>$this->quantity));
                if($data){
                    $this->msg = "Item Added To Cart";
                    $this->type = "success";
                }
            }
            else{
                $this->msg = "Item Already Exist in Cart";
                $this->type = "success";
            }
        }
        else{
            if(!session()->has('cart')){
                $cart = array($id => 1);
                $this->msg = "Item Added To Cart";
                $this->type = "success";
                session()->put('cart',$cart);
            }
            else{
                $cart = session('cart');
                if(array_key_exists($id,$cart)){
                    $this->msg = "Item Already Exist in Cart";
                    $this->type = "error";
                }
                else{
                    $cart[$id] = 1;
                    $this->msg = "Item Added To Cart";
                    $this->type ="success";
                }
            }
            session()->forget('cart');
            session()->put('cart',$cart);
        }
        $this->alert_message($this->msg,$this->type);
    }

    public function add_to_wishlist($id = NULL){
        if(session()->has('user_id')){
            $this->user_id = session('user_id');
            $this->quantity = DB::table('wishlist')->where(array('user_id'=>$this->user_id , 'pid'=>$id))->select('quantity')->get();
            if(!count($this->quantity)){
                $this->quantity = 1;
                $data = DB::table('wishlist')->insert(array('pid'=>$id,'user_id'=>$this->user_id,'quantity'=>$this->quantity));
                if($data){
                    $this->msg = "Item Added To Wishlist";
                    $this->type = "success";
                }
            }
            else{
                $this->msg = "Item Already Exist in Wishlist";
            }
        }
        else{
            if(!session()->has('wishlist')){
                $wishlist = array($id => 1);
                $this->msg = "Item Added To Wishlist";
                $this->type = "success";
            }
            else{
                $wishlist = session('wishlist');
                if(array_key_exists($id,$wishlist)){
                    $this->msg = "Item Already Exist in Wishlist";
                }
                else{
                    $wishlist[$id] = 1;
                    $this->msg = "Item Added To Wishlist";
                    $this->type ="success";
                }
            }
            session()->forget('wishlist');
            session()->put('wishlist',$wishlist);
        }
        $this->alert_message($this->msg,$this->type);
    }

    public function getcategories($cid){
        $this->category = $cid;
    }

    public function getvalues($attribute_id = NULL){
        $this->att_id = $attribute_id;
    }

    public function attribute_value_product($attribute_value = NULL){
        $this->att_val_id = $attribute_value;
    }

    public function render()
    {   
        
        $attributes = DB::table('attributes')->select('id','attribute')->get();
        $categories = DB::table('category')->select('id','category')->get();
        if($this->att_id != NULL){
            $att_values = DB::table('attribute_values')->where(['attribute_id'=> $this->att_id])->get();
        }
        else{
            $att_values = [];
        }
        if($this->category != NULL && $this->sub_category != NULL && $this->color == NULL && $this->size == NULL && $this->att_val_id == NULL){
            $data = DB::table('product')
            ->join('category', 'category.id', '=', 'product.cid')
            ->join('sub_category', 'sub_category.id', '=', 'product.sid')
            ->where(function($query) {
                $query->where('product.sid', $this->sub_category)
                      ->where('product.cid', $this->category);
            })
            ->select('category.category', 'sub_category.sub_category', 'product.id', 'product.product_name', 'product.status', 'product.price', 'product.cost')
            ->limit(8)
            ->get();
            $this->category = NULL;
            $this->category = NULL;
        }
        else if($this->category != NULL || $this->sub_category != NULL || $this->color != NULL || $this->size != NULL || $this->att_val_id != NULL){
            $data = DB::table('product')->join('category', 'category.id', '=', 'product.cid')->join('sub_category', 'sub_category.id', '=', 'product.sid')->join('product_attribute_selected','product.id','=','product_attribute_selected.product_id')->where(function($query) {
              $query->where('product.sid', $this->sub_category)->orWhere('product.cid', $this->category)->orWhere('product_attribute_selected.attribute_value',$this->att_val_id);
            })->select('category.category', 'sub_category.sub_category', 'product.id', 'product.product_name', 'product.status', 'product.price', 'product.cost')->limit(8)->get();
        }
        else{
            $data = DB::table('product')->join('category','category.id','=','product.cid')->join('sub_category','sub_category.id','=','product.sid')->select('category.category','sub_category.sub_category','product.id','product.product_name','product.addedon','product.status','product.price','product.cost')->limit(8)->orderBy('product.addedon',$this->orderby)->get();
        }

        return view('livewire.filters',array('categories'=>$categories,'data'=>$data , 'attributes'=>$attributes ,'values'=>$att_values));
    }
}
