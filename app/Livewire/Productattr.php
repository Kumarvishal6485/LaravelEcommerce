<?php

namespace App\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Persist;
use Livewire\Attributes\On;

class Productattr extends Component
{
    private $data = NULL;
    public $value = NULL;
    public $attribute = NULL;
    #[Persist]
    public $att_val = [];
    #[Persist]
    public $attribute_values_all = [];

    private function fetch_all_attribute_value() {
        $this->attribute_values_all = DB::select("select att.id as a_id, att.attribute , val.id as v_id , val.value from attributes as att inner join attribute_values as val on att.id = val.attribute_id");
    }

    public function fetchValues($att_id = NULL){
        $this->attribute = $att_id;
    }

    private function fetchAttributes(){
        $this->data = DB::table('attributes')->select('id','attribute')->get();
    }

    public function removeVal($att_id = NULL, $val_id = NULL) {
        foreach ($this->att_val as $key => $val_arr) {
            foreach ($val_arr as $index => $value) {
                if ($att_id == $key && $val_id == $value) {
                    unset($this->att_val[$key][$index]);
                    break;
                }
            }
        }
    }

    #[On('edit_product_variations')]
    public function edit_product_variations($data) {
        $str = $data;
        if (strlen($str) > 2) {
            $length = strlen($str) - 1;
            $str = substr($str, 1, $length-2);
            while(preg_match("/(.*?),/s", $str, $matches)) {
                $att_val = substr($matches[0],0,strlen($matches[0])-1);
                $str = substr($str, strlen($matches[0]), strlen($str));
                $key = (int)substr($att_val, 0, strpos($att_val,":"));
                $value = (int)substr($att_val,strpos($att_val,":")+1,);
                $this->att_val[$key][] = $value;
            }
            if (strlen($str)) {
                $key = (int)substr($str, 0, strpos($str,":"));
                $value = (int)substr($str,strpos($str,":")+1,);
                $this->att_val[$key][] = $value;
            }
        }
        $this->fetch_all_attribute_value();
    }

    public function fetchAttrVal($val_id = NULL, $att_id = NULL){
        if (!isset($this->att_val[$att_id])) {
            $this->att_val[$att_id] = [];
            $this->fetch_all_attribute_value();
        }
        if (!in_array($val_id, $this->att_val[$att_id])) {
            $this->att_val[$att_id][] = $val_id;
        }
    }

    public function render()
    {

        $this->fetchAttributes();
        if ($this->attribute != NULL) {
            $this->value = DB::table('attribute_values')->where(['attribute_id'=>$this->attribute])->select('id','value')->get();
        }

        if (count($this->att_val)) {
            session()->put('attributes',$this->att_val);
        } elseif (count($this->att_val) == 0) { 
            session()->forget('attributes');
        }

        return view('livewire.productattr', [
            'attributes' => $this->data,
            'values' => $this->value,
            'att_id' => $this->attribute,
            'sel_att_val' => $this->att_val,
            'att_vals' => $this->attribute_values_all
        ]);
    }
}