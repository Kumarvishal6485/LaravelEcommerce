<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class login extends Controller
{
    function login(Request $r){
        if(session()->has('username')){
            return redirect('admin/index');
        }
        return view('admin/login');
    }

    function logout(Request $r){
        session()->forget('username');
        if(session()->has('user_id')){
            session()->forget('user_id');
        }
        session()->flash('error','Access Denied');
        return redirect('admin');
    }
    
    function check_admin(Request $r){
        $username = $r['username'];
        $password = $r['password'];
        $data = DB::table('admin')->where(array('username'=>$username,'password'=>$password , 'type' => 'A' , 'active_status' => 1))->get();
        if(isset($data[0]->username)){
            session()->put('username',$username);
            return redirect('admin/index');
        }
        return view('admin/login');
    }
    
    function check_users(Request $r){
        $username = $r['username'];
        $password = $r['password'];
        $data = DB::table('admin')->where(array('username'=>$username,'password'=>$password , 'type' => 'U' , 'active_status' => 1))->get();
        $id = DB::table('admin')->where(array('username'=>$username ,'active_status' => 1 , 'type' => 'U'))->select('id')->get();
        if(isset($data[0]->username)){
            session()->put('user_id',$id[0]->id);
            session()->put('username',$username);
            if(session()->has('cart')){
                $cart_data = session()->get('cart');
                foreach($cart_data as $key => $value){
                    DB::table('cart')->insert([
                        'user_id' => $id[0]->id,
                        'pid' => $key,
                        'quantity' => $value
                    ]);
                }
            }
            session()->forget('cart');
        }
        return back();
    }
    function googlelogin(Request $r){
        return Socialite::driver('google')->redirect();
    }

    function googleLoginHandler(Request $r){
        $user = Socialite::driver('google')->user();
        $data = DB::table('admin')->where(array('username'=>$user->email ,'active_status' => 1 , 'type' => 'U'))->get();
        if(!count($data)){
            DB::table('admin')->insert(array('username'=>$user->email,'password' => 'dummy','active_status' => 1 , 'type' => 'U'));
        }
        $id = DB::table('admin')->where(array('username'=>$user->email ,'active_status' => 1 , 'type' => 'U'))->select('id')->get();
        session()->put('user_id',$id[0]->id);
        session()->put('username',$user->email);  
        if(session()->has('cart')){
            $cart_data = session()->get('cart');
            foreach($cart_data as $key => $value){
                DB::table('cart')->insert([
                    'user_id' => $id[0]->id,
                    'pid' => $key,
                    'quantity' => $value
                ]);
            }
        }
        session()->forget('cart');
        return redirect('/');
    }

    function logout_user(Request $r){
        session()->forget('username');
        if(session()->has('user_id')){
            session()->forget('user_id');
        }
        session()->flush();
        session()->flash('error','Access Denied');
        return redirect('/');
    }

}
