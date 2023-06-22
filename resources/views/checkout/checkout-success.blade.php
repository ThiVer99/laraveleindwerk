@extends('layouts.app')
@section('content')
    <div class="bg-white row min-vh-100 d-flex justify-content-center">
        <div class="col-12 col-lg-10 mt-5 pt-5">
            <div class="row">
                <div class="text-center py-5">
                    <h1 class="ff-rmv-bold"><span class="text-danger">Thank You!</span> your Order has been Processed.</h1>
                    <i class="py-2 fa-regular text-danger fa-circle-check fs-1"></i>
                </div>
                <div class="col-12 col-lg-8 ff-rmv">
                    <h2>My order</h2>
                    <hr>
                    @foreach($cartItems as $cartItem)
                        <div class="row py-4 position-relative">
                            <div class="col-4 col-lg-2">
                                <a href="{{ route('frontend.show',$cartItem->id) }}">
                                    <img alt="shoe" class="img-fluid border-cart-item"
                                         src="{{$cartItem->model->photo->file}}">
                                </a>
                            </div>
                            <div class="col-8 col-lg-4 row align-items-center">
                                <p>Name: {{ $cartItem->name }}</p>
                                <p>Price: &euro; {{ $cartItem->price }}</p>
                                <p>Size: {{ $cartItem->options->size->name }}</p>
                                <p class="m-0">
                                    Color: {{ implode('/', $cartItem->model->colors->pluck('name')->toArray()) }}</p>
                            </div>
                            <div class="col-4 col-lg-2 py-3 py-lg-0">
                                <p>Amount: {{ $cartItem->qty }}</p>
                                <p>Total:&euro; {{ $cartItem->price * $cartItem->qty }}</p>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                </div>
                <div class="col-12 col-lg-4 ff-rmv">
                    <h2>Order summary</h2>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5>Total:</h5>
                        <p>&euro;{{$order->total_price}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
