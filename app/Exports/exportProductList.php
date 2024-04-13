<?php

namespace App\Exports;

//use App\Models\product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class exportProductList implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'category',
            'sub category',
            'product id',
            'product_name',
            'product_status',
        ];
    }

    public function collection()
    {
        $data = DB::table('product')->join('category','category.id','=','product.cid')->join('sub_category','sub_category.id','=','product.sid')->select('category.category','sub_category.sub_category','product.id','product.product_name','product.status')->get();
        return $data;   
    }
}
