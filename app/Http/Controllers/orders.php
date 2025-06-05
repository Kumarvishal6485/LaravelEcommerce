<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\http\controllers\mailer;

class orders extends Controller
{
    /**
     * Display a listing of the resourc->
     */
    public function index()
    {
        if(session()->has('transaction')){
            session()->forget('transaction');
        }
        $uid = session()->get('user_id');
        $data = DB::table('orders')->join('ordered_product_details','orders.id','=','ordered_product_details.order_id')->where(['orders.uid' => $uid])->select('orders.id as oid','orders.amount')->distinct()->get();
        return view('order',['data' => $data , 'uid' => $uid]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
            DB::beginTransaction();
            $uid = Request()->session()->get('user_id');
            $transaction_data = Request()->session()->get('transaction');
            
            //fetch data from cart
            $cart_data = DB::table('cart')->join('product','cart.pid','=','product.id')->where('cart.user_id',$uid)->select('cart.pid','cart.quantity','product.price')->get();

            $items_ordered = (count($cart_data) == 0) ? 1 : count($cart_data);

            $id = DB::table('orders')->insertGetId([
                'amount' => $transaction_data['amount'],
                'reference_id' => $transaction_data['reference_id'],
                'payment_status' => $transaction_data['status'],
                'gateway_created_time' => $transaction_data['created_at'],
                'uid' => $uid,
                'item_ordered' => $items_ordered
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
                    'email' => $checkout_detail['email'],
                    'phone' => $checkout_detail['phone'],
                    'alternate_phone' => $checkout_detail['alternate_phone'] == "" ? $checkout_detail['phone'] : $checkout_detail['alternate_phone'],
                    'house_no' => $checkout_detail['house_no'],
                    'street' => $checkout_detail['street'],
                    'state' => $checkout_detail['state'],
                    'city' => $checkout_detail['city'],
                    'country' => $checkout_detail['country'],
                    'pincode' => $checkout_detail['pincode']
                ]);

                if(Request()->session()->has('products')){
                    DB::table('ordered_product_details')->insert([
                        'pid' => session('products'),
                        'quantity' => 1,
                        'order_id' => $id,
                        'price' => $transaction_data['amount']
                    ]);
                }
                else{
                //cart
                //$cart_data = DB::table('cart')->join('product','cart.pid','=','product.id')->where('cart.user_id',$uid)->select('cart.pid','cart.quantity','product.price')->get();
                foreach($cart_data as $data){
                        DB::table('ordered_product_details')->insert([
                            'pid' => $data->pid,
                            'order_id' => $id,
                            'quantity' => $data->quantity,
                            'price' => $data->price
                        ]);
                    }
                    DB::table('cart')->where('user_id',$uid)->delete();
                }
                DB::table('cart')->where('user_id',$uid)->delete();
            }
            DB::commit();
            if (session('username') != $checkout_detail['email']) {
                $userEmails = [session('username'), $checkout_detail['email']];
            } else {
                $userEmails = [session('username')];
            }
            $orderMailSubject = "Order Placed Successfully";
            mailer::sendMail($userEmails, $orderMailSubject);               //Send Order Placed
            Request()->session()->forget('transaction');
            return redirect('orders/'.$id);
        }
        
        catch(Exception $e){
            DB::rollback();
            mailer::sendMail($userEmail, $orderMailSubject);               //Send Order failed mail
            echo $e->getMessage();
        }
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
        $data = DB::table('orders')->join('ordered_product_details','orders.id','=','ordered_product_details.order_id')->join('user_details','orders.id','=','user_details.order_id')->join('contact_details','orders.id','=','contact_details.oid')->where(['orders.id' => $id, 'orders.uid'=> session('user_id')])->select('orders.id','orders.amount','orders.reference_id','orders.gateway_created_time','ordered_product_details.pid','ordered_product_details.quantity','user_details.name','contact_details.phone','contact_details.alternate_phone','contact_details.house_no','contact_details.street','contact_details.state','contact_details.city','contact_details.pincode','contact_details.country')->get();
        return view('order',['data' => $data , 'oid' => $id]);
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