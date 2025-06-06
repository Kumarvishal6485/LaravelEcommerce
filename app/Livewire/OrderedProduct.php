<?php

namespace App\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderedProduct extends Component
{
    public $order_id = NULL;
    public $user_id = NULL;
    public function mount($oid = NULL){
        $this->order_id = $oid;
        $this->user_id = session('user_id');
    }

    public function render()
    {
        if($this->order_id) {
            $data = DB::table('ordered_product_details')->join('product','product.id','=','ordered_product_details.pid')->join('orders','ordered_product_details.order_id','=','orders.id')->where(['ordered_product_details.order_id' => $this->order_id, 'orders.uid' => $this->user_id])->select('ordered_product_details.pid','ordered_product_details.quantity','ordered_product_details.price','product.id','product.product_name')->get();
        } else {
            $data = DB::table('orders')->join('ordered_product_details','orders.id','=','ordered_product_details.order_id')->join('product','ordered_product_details.pid','=','product.id')->where('orders.uid','=',$this->user_id)->select('orders.id as oid','orders.item_ordered','product.product_name','product.id','orders.created_at')->orderby('orders.created_at','desc')->get();
        }
        return view('livewire.ordered-product',[
            'data' => $data , 
            'type' => ($this->order_id == NULL) ? "all_orders" : "current_order"
        ]);
    }
}
