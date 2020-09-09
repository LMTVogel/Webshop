@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$product->name}}</h1>
        <div class="row">
            <div class="col-8">
                <img src="{{$product->image}}" alt="">
            </div>
            <div class="col-4">
                <p>{{$product->description}}</p>
                <p>&euro; {{$product->price}}</p>
                <form action="POST">
                    <label for="qtyProduct">Aantal producten:</label>
                    <input type="number">
                </form>
                <a href="{{ route('add-to-cart', $product->id) }}" class="btn btn-success col-12 cartButton">Toevoegen aan winkelmandje</a>
            </div>
        </div>
    </div>
@endsection