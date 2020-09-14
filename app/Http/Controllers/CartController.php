<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

class CartController extends Controller
{
    
    public function addToCart($id)
    {
        $product = Product::find($id);
        
        $cart = new Cart();

        $cart->add($product, $product->id);

        return redirect()->back()->with('message', 'Product is toegevoegd aan uw winkelmand!');
    }
}
