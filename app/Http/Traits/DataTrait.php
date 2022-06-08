<?php

namespace App\Http\Traits;

use App\Models\Product;
use Illuminate\Http\Request;

trait DataTrait
{
    public function data()
    {
        $products = Product::all();
        // dd("enter");
        return $products;
        // return view('display', ['product' => $products]);
    }
}
