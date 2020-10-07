<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

class CartController extends Controller
{

    /**
     * Kijkt of er een cart in de session zit.
     */
    public function getCart() 
    {
        // Kijkt of er geen cart aanwezig is in de session.
        if (!Session::has('cart')) {
            return view('shoppingcart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shoppingcart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }

    /**
     * Wordt uitgevoerd als er een product in de shoppingcart komt.
     * @param int $id
     */
    public function addToCart($id)
    {
        // Het ID van het product wordt gevonden.
        $product = Product::find($id);
        // Er wordt een nieuw cart object aangemaakt.
        $cart = new Cart();
        // Function wordt uitgevoerd in het de class om de producten toe te voegen.
        $cart->add($product, $product->id);
        // In de view krijg je een succes balkje te zien ter bevestiging.
        return redirect()->back()->with('message', 'Product is toegevoegd aan uw winkelmand!');
    }

    /**
     * Wordt uitgevoerd als er een item moet worden verwijderd.
     * @param int $id
     */
    public function removeItem($id)
    {
        // Maakt een nieuw cart object aan.
        $cart = new Cart();
        // Voert de function uit in de cart class.
        $cart->removeItem($id);
        
        return redirect()->back();
    }
    /**
     * Verwijderd alle items uit de cart.
     * @param int $id
     */
    public function removeAllItems($id)
    {
        // Maakt een nieuw cart object aan.
        $cart = new Cart();
        // Voert de function uit in de cart class.
        $cart->removeAllItems($id);

        return redirect()->back();
    }
    
    /**
     * Verwijderd de volledige cart uit de session
     */
    public function removeCart()
    {
        // Maakt een nieuw cart object aan.
        $cart = new Cart();
        // Voert de function uit in de Cart class.
        $cart->removeCart();

        return redirect('/');
    }
}