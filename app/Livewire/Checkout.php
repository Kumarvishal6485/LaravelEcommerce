<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class Checkout extends Component
{
    public $pid = null;
    public $name = "";
    public $email = "";
    public $phone = "";
    public $alternate_phone = "";
    public $house_no = "";
    public $street = "";
    public $state = "";
    public $city = "";
    public $country = "";
    public $pincode = "";

    public function mount($pid = null, $name = null, $email = null, $phone = null, $alternate_phone = null, $house_no = null, $street = null, $state = null, $city = null, $country = null, $pincode = null) {
        $this->name = $name ?? $this->name;
        $this->phone = $phone ?? $this->phone;
        $this->alternate_phone = $alternate_phone ?? $this->alternate_phone;
        $this->email = $email ?? $this->email;
        $this->house_no = $house_no ?? $this->house_no;
        $this->street = $street ?? $this->street;
        $this->state = $state ?? $this->state;
        $this->city = $city ?? $this->city;
        $this->country = $country ?? $this->country;
        $this->pincode = $pincode ?? $this->pincode;

        if ($pid != null) {
            $data = DB::table('product')->where('id', $pid)->value('price');
            session()->put('amount', $data);
            session()->put('products',$pid);
        }
    }

    public function submitOrder() {
        $user_data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'alternate_phone' => $this->alternate_phone,
            'house_no' => $this->house_no,
            'street' => $this->street,
            'state' => $this->state,
            'city' => $this->city,
            'country' => $this->country,
            'pincode' => $this->pincode,
        ];
        session()->put('checkout_details', $user_data);
        return redirect()->to('stripe');
    }

    public function render() {
        return view('livewire.checkout');
    }
}
