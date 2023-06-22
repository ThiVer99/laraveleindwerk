@extends('layouts.app')
@section('content')
    <div>
        <div class="bg-white row min-vh-100 d-flex justify-content-center">
            <div class="col-12 col-lg-10 row mt-5 pt-5">
                <div class="col-12 col-lg-12 ff-rmv">
                    <h2>My Orders</h2>
                    <hr>
                    @if($orders->isEmpty())
                        no orders
                    @else
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            @foreach($orders as $order)
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <div class="accordion-button" type="button" data-bs-toggle="collapse"
                                             data-bs-target="#panelsStayOpen-collapse{{$order->id}}"
                                             aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            <div class="d-flex flex-column">
                                                <p>Order date: {{$order->created_at}}</p>
                                                <div>
                                                    @foreach($order->products as $product)
                                                        <img width="100px" class="rounded rounded-3 me-3"
                                                             src="{{$product->photo->file}}" alt="product foto">
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="panelsStayOpen-collapse{{$order->id}}" class="accordion-collapse collapse">
                                        <div class="accordion-body d-flex flex-column gap-2">
                                            @foreach($order->products as $product)
                                                <div class="row py-4 position-relative">
                                                    <div class="col-4 col-lg-2">
                                                        <a href="{{ route('frontend.show',$product->id) }}">
                                                            <img alt="shoe" class="img-fluid border-cart-item"
                                                                 src="{{$product->photo->file}}">
                                                        </a>
                                                    </div>
                                                    <div class="col-8 col-lg-6 row">
                                                        <p>Name: {{ $product->name }}</p>
                                                        <p>Price: &euro; {{ $product->price }}</p>
                                                        <p>Size: {{$sizes[$product->pivot->size_id -1 ]->name}}</p>
                                                        <p class="m-0">
                                                            Color: {{ implode(' / ', $product->colors->pluck('name')->toArray()) }}</p>
                                                    </div>
                                                    <div class="col-4 col-lg-4 py-3 py-lg-0">
                                                        <p>Amount: {{ $product->pivot->quantity }}</p>
                                                        <p>Total:&euro; {{ $product->price * $product->pivot->quantity }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

@endsection
