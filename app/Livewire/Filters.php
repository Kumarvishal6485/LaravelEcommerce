<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Persist;

class Filters extends Component
{
    use LivewireAlert;

    public $data = [];
    public $user_id;
    public $quantity = NULL;
    public $category = NULL;
    public $sub_category = NULL;
    public $orderby = "ASC";
    public $type = "error";
    public $msg = "Can't Proceed Further";
    public $att_values = NULL;
    public $att_id = NULL;
    public $color = NULL;
    public $size = NULL;
    public $att_val_id = NULL;
    public $openAccordion = NULL;

    #[Persist]
    public $attribute_selected = [];

    public function mount($cid = NULL, $sid = NULL, $orderby = "ASC")
    {
        $this->category = $cid;
        $this->sub_category = $sid;
        $this->orderby = $orderby;
    }

    public function updated($propertyName)
    {
        $this->attribute_selected = $this->attribute_selected;
    }

    public function alert_message($msg, $type = "success")
    {
        $this->alert($type, $msg, [
            'position' => 'top-end',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

    #[On('add_to_cart')]
    public function add_to_cart($id = NULL)
    {
        if (session()->has('user_id')) {
            $this->user_id = session('user_id');
            $this->quantity = DB::table('cart')->where(['user_id' => $this->user_id, 'pid' => $id])->select('quantity')->get();

            if (!count($this->quantity)) {
                $this->quantity = 1;
                $data = DB::table('cart')->insert(['pid' => $id, 'user_id' => $this->user_id, 'quantity' => $this->quantity]);
                $this->msg = $data ? "Item Added To Cart" : $this->msg;
                $this->type = "success";
            } else {
                $this->msg = "Item Already Exist in Cart";
                $this->type = "success";
            }
        } else {
            $cart = session('cart', []);
            if (isset($cart[$id])) {
                $this->msg = "Item Already Exist in Cart";
                $this->type = "error";
            } else {
                $cart[$id] = 1;
                session(['cart' => $cart]);
                $this->msg = "Item Added To Cart";
                $this->type = "success";
            }
        }
        $this->alert_message($this->msg, $this->type);
    }

    #[On('add_to_wishlist')]
    public function add_to_wishlist($id = NULL)
    {
        if (session()->has('user_id')) {
            $this->user_id = session('user_id');
            $this->quantity = DB::table('wishlist')->where(['user_id' => $this->user_id, 'pid' => $id])->select('quantity')->get();

            if (!count($this->quantity)) {
                $this->quantity = 1;
                $data = DB::table('wishlist')->insert(['pid' => $id, 'user_id' => $this->user_id, 'quantity' => $this->quantity]);
                $this->msg = $data ? "Item Added To Wishlist" : $this->msg;
                $this->type = "success";
            } else {
                $this->msg = "Item Already Exist in Wishlist";
            }
        } else {
            $wishlist = session('wishlist', []);
            if (isset($wishlist[$id])) {
                $this->msg = "Item Already Exist in Wishlist";
            } else {
                $wishlist[$id] = 1;
                session(['wishlist' => $wishlist]);
                $this->msg = "Item Added To Wishlist";
                $this->type = "success";
            }
        }
        $this->alert_message($this->msg, $this->type);
    }

    public function getvalues($attribute_id = NULL)
    {
        $this->att_id = $attribute_id;
        $this->openAccordion = $attribute_id;
    }

    public function attribute_value_product($attribute_value = NULL)
    {
        $this->att_val_id = $attribute_value;
        $index = strpos($attribute_value, '/');
        $attribute_id = substr($attribute_value, 0, $index);
        $value_id = substr($attribute_value, $index + 1);

        $this->attribute_selected[$attribute_id] = $value_id;
        $this->attribute_selected = $this->attribute_selected;
    }

    public function render()
    {
        $attributes = DB::table('attributes')->select('id', 'attribute')->get();
        $categories = DB::table('category')->select('id', 'category')->get();
        $att_values = $this->att_id ? DB::table('attribute_values')->where(['attribute_id' => $this->att_id])->get() : [];

            if (!count($this->attribute_selected) && $this->category != NULL) {
                $this->data = DB::table('product')
                ->join('category', 'category.id', '=', 'product.cid')
                ->join('sub_category', 'sub_category.id', '=', 'product.sid')
                ->where(function ($query) {
                    $query->where('product.sid', $this->sub_category)
                    ->orWhere('product.cid', $this->category);
                })
                ->select('category.category', 'sub_category.sub_category', 'product.id', 'product.product_name', 'product.status', 'product.price', 'product.cost')->get();
            } elseif (count($this->attribute_selected)) {
                $this->data = DB::table('product')
                ->join('category', 'category.id', '=', 'product.cid')
                ->join('sub_category', 'sub_category.id', '=', 'product.sid')
                ->where(function ($query) {
                    $query->where('product.sid', $this->sub_category)
                          ->orWhere('product.cid', $this->category)
                          ->orWhere(function ($query) {
                              foreach ($this->attribute_selected as $attribute => $value) {
                                  $query->orWhere('product.Variations', 'like', "%{$attribute}:{$value}%");
                              }
                          });
                })
                ->select(
                    'category.category',
                    'sub_category.sub_category',
                    'product.id',
                    'product.product_name',
                    'product.status',
                    'product.price',
                    'product.cost'
                )
                ->get();
            } else {
                $this->data = DB::table('product')
                ->join('category', 'category.id', '=', 'product.cid')
                ->join('sub_category', 'sub_category.id', '=', 'product.sid')
                ->select('category.category', 'sub_category.sub_category', 'product.id', 'product.product_name', 'product.addedon', 'product.status', 'product.price', 'product.cost')
                ->limit(8)
                ->orderBy('product.addedon', $this->orderby)
                ->get();
            }

        return view('livewire.filters', [
            'categories' => $categories,
            'data' => $this->data,
            'attributes' => $attributes,
            'values' => $att_values,
            'attribute_selected' => $this->att_val_id
        ]);
    }
}
