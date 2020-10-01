<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        Order::create(['user_id' => $request->user_id, 'order_total' => $request->order_total]);

        return redirect('/removeCart');
    }

    public function orderShow()
    {
        $getOrder = Order::get()->where('user_id', Auth::user()->id);

        return view('running-orders', ['getOrder' => $getOrder]);
    }
}