@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex">
            <h1 class="m-0">Order</h1>
            <a href="{{route('orders.index')}}" class="btn btn-primary m-2 rounded-pill">All Orders</a>
        </div>
    </div>
    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <h2>Order #{{$order->id}} - &euro;{{$order->total_price}} Details:</h2>
        <hr>
        <div class="pt-2">
            <p>User: {{$order->user->name . ' - ' . $order->user->email}}</p>
            <p>Status: <span class="font-weight-bolder text-success @if($order->status != 'paid') text-danger @endif">{{$order->status}}</span></p>
            <p>Address: {{$order->address->address . ' ' . $order->address->number . ', ' . $order->address->postal_code .' '.$order->address->city . ', '. $order->address->state . ' ' . $order->address->country}}</p>
            <p>Payment Intent: @if($order->payment_intent){{$order->payment_intent}}@else <span class="text-danger">no payment</span> @endif</p>
        </div>
    </div>
    <table class="table table-striped shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <thead>
        <tr>
            <th>Product Id</th>
            <th>Name</th>
            <th>Size</th>
            <th>Price per unit</th>
            <th>Quantity</th>
            <th>Price x quantity</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->products as $product)
            <tr>
                <td>{{$product->id}}</a></td>
                <td>{{$product->name}}</td>
                <td>{{$sizes[$product->pivot->size_id-1]->name}}</td>
                <td>&euro;{{$product->price}}</td>
                <td>{{$product->pivot->quantity}}</td>
                <td>&euro;{{$product->pivot->quantity * $product->price}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection


