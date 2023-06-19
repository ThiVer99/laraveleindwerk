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
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$order->id}}" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                        {{$order->created_at}} - {{$order->status}}
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse{{$order->id}}" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        @foreach($order->products as $product)
                                            <p>{{$product->name}} - {{$product->pivot->product_price}} - {{$colors[$product->pivot->color_id -1 ]->name}} - {{$sizes[$product->pivot->size_id - 1]->name}}</p>
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
