@extends('layouts.app')

@section('content')
    <h1>Categoriën</h1>
    @if (count($categories) > 1)
    <div class="container">
        <div class="row">
        @foreach ($categories as $category)
            <div class="col-sm">
                <div class="card catCard" style="width: 18rem;">
                    <img src="{{$category->image}}" class="card-img-top cardImg" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$category->name}}</h5>
                        <a href="/products-overview/{{$category->id}}" class="btn btn-primary">Bekijk de producten</a>
                    </div>      
                </div>
            </div>
        @endforeach
        </div>
    </div>
    @endif
@endsection