@extends('layouts.app')

@section('content')
    @if (Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach ($products as $product)
                        <li class="list-group-item">
                            <strong>Product: {{ $product['item'] ['name'] }}</strong>
                            <span class="badge">Aantal producten: {{ $product['qty'] }}</span>
                            <span class="label label-success">{{ $product['price'] }},-</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @else 
        <p>Er zit nog niks in je winkelmandje!</p>
    @endif
@endsection