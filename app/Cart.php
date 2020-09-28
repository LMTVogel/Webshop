<?php

namespace App;

use Session;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    /**
     * Constructor wordt gebruikt als er een cart moet worden aangemaakt.
     * 
     * @param mixed $cartItems
     */
    public function __construct()
    {
        // Kijkt of er al een cart bestaat zodat er geen data verloren gaat en de data wordt overgenomen.
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        // Mocht er een cart zijn word de oude data overgenomen.
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    
    /**
     * Voegt een item toe aan de cart.
     * 
     * @param mixed $item
     * @param int $id
     */
    public function add($item, $id)
    {
        // Array wordt aangemaakt voor product.
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        // Er wordt gekeken of er al een items zijn. Dan wordt er gekeken of het ID al voorkomt bij die items.
        if ($this->items) {
            // Kijkt of het ID voorkomt in de array.
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        // Qty gaat omhoog en prijs wordt opgeteld.
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        
        // De totalQty en totalPrice gaan omhoog.
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;

        // Data wordt opgeslagen in de session onder de naam cart.
        Session::put('cart', $this);    
    }

    public function removeItem($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }

        Session::put('cart', $this);
    }

    public function removeAllItems($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];

        unset($this->items[$id]);

        Session::put('cart', $this);
    }
}