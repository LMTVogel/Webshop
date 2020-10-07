@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Bestellings ID</th>
                <th scope="col">Totale prijs</th>
                <th scope="col">Besteldatum</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getOrders as $order)           
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->order_total }},-</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection