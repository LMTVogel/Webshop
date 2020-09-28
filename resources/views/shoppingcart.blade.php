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
            <a type="button" class="btn btn-primary">Bestel</a>
        </div>
    @else 
        <p>Er zit nog niks in je winkelmandje!</p>
    @endif
@endsection