<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Customer;

class stripe_payment_controller extends Controller
{
    function stripe(Request $r){
        if($r->session()->has('amount') == 0) return back();
        return view('Stripe');
    }

    function submitStripe(Request $request){
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        // Create Customer
        $customer = Customer::create([
            'name' => 'Vishal Kumar',
            'email' => 'kumarvishal6485@gmail.com'
        ]);
        $customerId = $customer->id;
    
        // Create PaymentIntent
        $paymentIntent = PaymentIntent::create([
            'amount' => $request->session()->get('amount'),
            'currency' => 'INR',
            'description' => 'Order',
            'customer' => $customerId,
            'payment_method' => 'pm_card_visa',
            'confirm' => true,
            'return_url' => 'http://127.0.0.1:8000/orders',
            'next_action' => null
        ]);
    
        // if ($paymentIntent->status === 'succeeded') {
            // Store transaction details in session
            $transaction_data = [
                'amount' => $paymentIntent->amount,
                'reference_id' => $paymentIntent->id,
                'status' => $paymentIntent->status,
                'created_at' => date('d-m-Y H:i:s', $paymentIntent->created)
            ];
    
            $request->session()->put('transaction', $transaction_data);
    
            // Redirect to order creation page after successful payment
            return redirect('orders/create');
        // } else {
        //     return back()->with('error', 'Payment failed! Try again.');
        // }
    }    
}
