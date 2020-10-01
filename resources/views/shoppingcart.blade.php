@extends('layouts.app')

@section('content')
    @if (Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach ($products as $product)
                        <li class="list-group-item">
                            <strong>Product: {{ $product['item'] ['name'] }}</strong>
                            <span class="badge">Aantal producten: {{ $product['qty'] }}</span>
                            <span class="label label-success">{{ $product['price'] }},-</span>
                            <div class="btn-group cartBtnGroup">
                                <a class="btn qtyBtn rounded bg-success" href="{{ route('cart.addToCart', ['id' => $product['item']['id']]) }}"><i class="far fa-plus-square iconColor"></i></a>
                                <a class="btn qtyBtn rounded bg-warning" href="{{ route('cart.removeItem', ['id' => $product['item']['id']]) }}"><i class="far fa-minus-square iconColor"></i></a>
                                <a class="btn qtyBtn rounded bg-danger" href="{{ route('cart.removeAllItems', ['id' => $product['item']['id']]) }}"><i class="far fa-trash-alt iconColor"></i></a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-offset-3 col-sm-offset-3">
                <strong>Totaal aantal producten: {{ $totalQty }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-offset-3 col-sm-offset-3">
                <strong>Totaal prijs: {{ $totalPrice }},-</strong>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="/order">
                @csrf
                <input type="hidden" name='user_id' value='{{Auth::user()->id}}'>
                <input type="hidden" name='order_total' value='{{ $totalPrice }}'>
                <button type='submit' class="btn btn-lg btn-block btn-success">Bestel</button>
            </form>
        </div>
    @else 
        <p>Er zit nog niks in je winkelmandje!</p>
        <a href="{{ route('index') }}" type="button" class="btn btn-primary">Verder winkelen</a>
    @endif
@endsection