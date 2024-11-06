<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orders extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = json_encode(Request()->session()->get('transaction'));
        return response($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $uid = Request()->session()->get('user_id');
        $transaction_data = Request()->session()->get('transaction');
        $id = DB::table('orders')->insertGetId([
            'amount' => $transaction_data['amount'],
            'reference_id' => $transaction_data['referece_id'],
            'status' => $transaction_data['status'],
            'gateway_created_time' => $transaction_data['created_at'],
            'uid' => $uid
        ]);
        
        if($transaction_data && $transaction_data['status']){
            $checkout_detail = Request()->session()->get('checkout_details');
            DB::table('user_details')->insert([
                'name' => $checkout_detail['name'],
                'order_id' => $id,
                'user_id' =>  $uid
            ]);

            DB::table('contact_details')->insert([
                'user_id' => $uid,
                'oid' => $id,
                'phone' => $checkout_detail['phone'],
                'alternate_phone' => $checkout_detail['alternate_phone'],
                'house_no' => $checkout_detail['house_no'],
                'street' => $checkout_detail['street'],
                'state' => $checkout_detail['state'],
                'city' => $checkout_detail['city'],
                'country' => $checkout_detail['country'],
                'pincode' => $checkout_detail['pincode']
            ]);
        }
        Request()->session()->forget('transaction');
        return redirect('orders/'.$id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = DB::table('orders')->where(['id' => $id])->get();
        return view('order',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}