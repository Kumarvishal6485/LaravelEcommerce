<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Cart extends Component
{
    use LivewireAlert;

    public function alert_message($msg,$type = "success"){
        $this->alert($type, $msg , [
            'position' => 'top-end',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

    public function dec_quantity($pid,$quantity){
        if($quantity > 1){
            --$quantity;
            if(session()->has('user_id')){
                $user_id = session('user_id');
                DB::table('cart')->where(array('user_id'=>$user_id, 'id'=> $pid))->update(array('quantity' => $quantity));
            }
            else{
                $cart = session('cart');
                session()->forget('cart');
                $cart[$pid] = $quantity;
                session()->put('cart',$cart);
            }
        }
    }

    public function inc_quantity($pid,$quantity){
        ++$quantity;
        if(session()->has('user_id')){
            $user_id = session('user_id');
            DB::table('cart')->where(array('user_id'=>$user_id, 'id'=> $pid))->update(array('quantity' => $quantity));
        }
        else{
            $cart = session('cart');
            session()->forget('cart');
            $cart[$pid] = $quantity;
            session()->put('cart',$cart);
        }
    }

    public function remove_product($pid = NULL){
        if(session()->has('user_id')){
            $user = session('user_id');
            $res = DB::table('cart')->where(['id' => $pid , 'user_id' => $user])->delete();
        }
        else{
            $cart = session('cart');
            session()->forget('cart');
            unset($cart[$pid]);
            session()->put('cart',$cart);
        }
        $this->alert_message("Item Removed From Cart","success");
    }

    public function render()
    {
        if(session()->has('user_id')){ // for registered user
            $data = DB::table('cart')->join('product','cart.pid','=','product.id')->select('cart.pid','cart.quantity','cart.id','product.cid','product.sid','product.product_name','product.price')->where(['cart.user_id' => session('user_id')])->get();
        }
        else{ // for guest user
            if(session()->has('cart')){
                $cart = session('cart');
                $pid = array_keys($cart);
                $data = DB::table('product')->whereIn('id',$pid)->select('id','cid','sid','product_name','price')->get();
                return view('livewire.cart',array('data' => $data , 'cart' => $cart));
            }
            else{
                $data = NULL;
            }
        }
        return view('livewire.cart',array('data' => $data));
    }
}