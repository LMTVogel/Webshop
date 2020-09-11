@extends('layouts.app')

@section('content')
    <h1>Producten</h1>
    <div class="container">
        <div class="row">
        @foreach ($products as $product)
            <div class="col-sm">
                <div class="card catCard" style="width: 18rem;">
                    <img src="{{$product->image}}" class="card-img-top cardImg" alt="...">
                    <div class="card-body row">
                        <h5 class="card-title col-6">{{$product->name}}</h5>
                        <small class="col-6">&euro; {{$product->price}}</small>
                        <a href="{{ route('product.details', $product->id)}}" class="btn btn-primary col-12">Bekijk het product</a>
                        @guest
                            <p>Een product bestellen? Zorg er eerst voor dat u <a href="{{ route('login') }}">hier inlogd</a> of <a href="{{ route('register') }}">registreerd</a>.</p>    
                        @else    
                            <a href="{{ route('cart.addToCart', $product->id) }}" class="btn btn-success col-12 cartButton">Toevoegen aan winkelmandje</a>    
                        @endguest
                        
                    
                    </div>      
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection