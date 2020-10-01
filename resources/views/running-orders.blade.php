@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container">
        <h1>{{$product->name}}</h1>
        <div class="row">
            <div class="col-8">
                <img src="{{$product->image}}" alt="">
            </div>
            @guest
                <div class="col-4">
                    <p>{{$product->description}}</p>
                    <p>&euro; {{$product->price}}</p>
                    <p>Een product bestellen? Zorg er eerst voor dat u <a href="{{ route('login') }}">hier inlogd</a> of <a href="{{ route('register') }}">registreerd</a>.</p>  
                </div>    
            @else 
                <div class="col-4">
                    <p>{{$product->description}}</p>
                    <p>&euro; {{$product->price}}</p>
                    <a href="{{ route('cart.addToCart', $product->id) }}" class="btn btn-success col-12 cartButton">Toevoegen aan winkelmandje</a>
                </div>
            @endguest
        </div>
    </div>
@endsection