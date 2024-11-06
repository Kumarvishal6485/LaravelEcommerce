<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class stripe_payment_controller extends Controller
{
    function stripe(Request $r){
        if($r->session()->has('amount') == 0) return back();
        return view('Stripe');
    }

    function submitStripe(Request $request){
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = PaymentIntent::create([
            'amount' => $request->session()->get('amount'),
            'currency' => 'inr',
            'payment_method_types' => ['card'],
            'description' => 'Order'
        ]);

        $transaction_data = [
            'amount' => $charge->amount,
            'referece_id' => $charge->id,
            'status' => $charge->status,
            'created_at' => date('d-m-Y H:i:s',$charge->created)
        ];

        $request->session()->put('transaction',$transaction_data);        
        return redirect('orders/create');
    }
}