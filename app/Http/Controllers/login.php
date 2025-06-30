<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class login extends Controller
{
    function createUser (Request $r) {
        $user = User::create([
            'name' => $r->username,
            'email' => $r->username,
            'password' => $r->password,
            'type' => 'U'
        ]);
        if ($user) {
            $loggedIn = Auth::attempt([
                'name' => $r->username,
                'email' => $r->username,
                'password' => $r->password
            ]);
            $id = Auth::id();
            session()->put('user_id', $id);
            return redirect('/');
        }
    }

    //method to redirect on the different panel (admin / website)
    function login(Request $r){
        if(session()->has('username')){
            return redirect('admin/index');
        }
        return view('admin/login');
    }

    public static function getUserId() {
        return Auth::id();
    }

    // admin logout
    function logout(Request $r){
        if(Auth::check()){
            Auth::logout();
            if (session()->has('username')) {
                session()->forget('username');
            }
            if (session()->has('user_id')) {
                session()->forget('user_id');
            }
            session()->put("msg",["Logged Out Successfully","success"]);
        }
        return redirect('admin');
    }
    
    // admin login
    function check_admin(Request $r){
        $username = $r['username'];
        $password = $r['password'];
        $data = DB::table('users')->where(['email' => $r->username, 'type' => 'A'])->first();
        $credentials = [
            'email' => $username,
            'password' => $password
        ];
        if($data && Hash::check($password, $data->password) && Auth::attempt($credentials)){
            session()->put('user_id',Auth::id());
            session()->put('username',Auth::id());
            return redirect('admin/index');
        }
        return view('admin/login');
    }
    
    //user login
    function check_users(Request $r){
        $username = $r['username'];
        $password = $r['password'];
        $data = DB::table('users')->where(['email' => $r->username, 'type' => 'U'])->first();
        $credentials = [
            'email' => $username,
            'password' => $password
        ];
        if($data && Hash::check($password,$data->password) && Auth::attempt($credentials)){
            session()->put("msg",["Logged In Successfully","success"]);
            $userId = Auth::user()->id;
            session()->put('user_id', $userId);
            if(session()->has('cart')){
                $cart_data = session()->get('cart');
                foreach($cart_data as $key => $value){
                    DB::table('cart')->insert([
                        'user_id' => $userId,
                        'pid' => $key,
                        'quantity' => $value
                    ]);
                }
            }
            session()->forget('cart');
        }
        else {
            session()->put("msg",["Login Required","error"]);    
        }
        return back();
    }

    // socialite driver
    function googlelogin(Request $r){
        return Socialite::driver('google')->redirect();
    }

    // google login
    function googleLoginHandler(Request $r){
        $user = Socialite::driver('google')->user();
        $data = DB::table('admin')->where(array('username'=>$user->email ,'active_status' => 1 , 'type' => 'U'))->get();
        if(!count($data)){
            DB::table('admin')->insert(array('username'=>$user->email,'password' => 'dummy','active_status' => 1 , 'type' => 'U'));
        }
        $id = DB::table('admin')->where(array('username'=>$user->email ,'active_status' => 1 , 'type' => 'U'))->select('id')->get();
        session()->put('user_id',$id[0]->id);
        session()->put('username',$user->email);  
        session()->put("msg",["Logged In Successfully","success"]);
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

    // user logout
    function logout_user(Request $r){
        $user = Auth::user();
        if($user){
            Auth::logout();
            session()->put("msg",["Logged Out Successfully","success"]);
        }
        return redirect('/');
    }
}