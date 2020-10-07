<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;

class OrderController extends Controller
{
    /**
     * Pushed de order door naar het order table.
     * @param mixed $request
     */
    public function order(Request $request)
    {
        // Maakt een nieuwe bestelling aan in de order table.
        Order::create(['user_id' => $request->user_id, 'order_total' => $request->order_total]);
        // Deze return zorgt ervoor dat de cart uit de session wordt verwijderd.
        return redirect('/removeCart');
    }

    /**
     * Haalt de orders op uit de order table om ze te kunnen zien in de besteloverzicht pagina.
     */
    public function orderShow()
    {
        // Haalt de orders op uit de order table met het overeenkomende ingelogde user ID.
        $getOrders = Order::get()->where('user_id', Auth::user()->id);
        // Stuurt de orders mee van het overeenkomende ID naar de view.
        return view('running-orders', ['getOrders' => $getOrders]);
    }
}