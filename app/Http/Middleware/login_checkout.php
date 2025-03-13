<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class login_checkout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->session()->has('username')){
            session()->put('message','Login Required!');
            return back();
        }
        else{
            if(session()->has('message')){
                session()->forget('message');
            }
        }
        return $next($request);
    }
}
