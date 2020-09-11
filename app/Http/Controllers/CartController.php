<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    // public function add(Product $product)
    // {
    //     dd($product);
    // }
    
    public function addToCart(Product $product)
    {
        dd($product);

    }
}
