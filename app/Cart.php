<?php

namespace App;

use Session;

class Cart
{
    private $items = null;
    private $totalQty = 0;
    private $totalPrice = 0;
    
    /**
     * Constructor wordt gebruikt als er een cart moet worden aangemaakt.
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
     * @param mixed $item
     * @param int $id
     */
    public function add($item, $id)
    {
        // Array wordt aangemaakt voor product.
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        // Er wordt gekeken of er al een items zijn om geen nieuwe array aan te hoeven maken.
        if ($this->items) {
            // Kijkt of het ID voorkomt in de array.
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        // Qty gaat omhoog en prijs wordt opgeteld.
        $storedItem['qty']++;
        // Prijs wordt keer het aantal items gedaan.
        $storedItem['price'] = $item->price * $storedItem['qty'];
        
        // De totalQty en totalPrice gaan omhoog.
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;

        // Data wordt opgeslagen in de session onder de naam cart.
        Session::put('cart', $this);    
    }

    /**
     * Verwijderd een item uit de cart.
     * @param int $id 
     */
    public function removeItem($id)
    {
        // Het aantal gaat omlaag
        $this->items[$id]['qty']--;
        // De prijs van dat product wordt van het totaal afgetrokken van die groep items
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        // Het totale aantal wordt met 1 verminderd.
        $this->totalQty--;
        // De totale prijs van het mandje wordt omlaag gehaald met de prijs van dat ene product.
        $this->totalPrice -= $this->items[$id]['item']['price'];

        // Als er geen items meer in in de array zitten wordt hij ge unset.
        if($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
        // De data wordt in de session gedaan onder de naam cart.
        Session::put('cart', $this);
    }

    /**
     * Verwijderd alle items uit de cart.
     * @param int $id
     */
    public function removeAllItems($id)
    {
        // Haalt het aantal van die productengroep van het totaal aantal eraf.
        $this->totalQty -= $this->items[$id]['qty'];
        // Haalt de totaalprijs van die productengroep van het totaalbedrag eraf.
        $this->totalPrice -= $this->items[$id]['price'];
        // Unset de itemsgroep.
        unset($this->items[$id]);
        // Stopt de overige informatie weer terug in de sessie.
        Session::put('cart', $this);
    }

    /**
     * Verwijderd de volledige cart sessie.
     */
    public function removeCart()
    {
        // Hij vergeet de sessie met de naam cart.
        Session::forget('cart');
    }

    /**
     * Deze function kan op een veilige manier bij de private items komen.
     * @param int $propertyName
     */
    public function __get($propertyName)
    {
        // Kijkt of de property bestaat in de class en geeft die dan terug in de return.
        if (property_exists($this, $propertyName)) {
            return $this->$propertyName;
        }
    }
}