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
                                        {{$order->created_at}} - {{$order->status}} - &euro;{{$order->total_price}}
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse{{$order->id}}" class="accordion-collapse collapse">
                                    <div class="accordion-body d-flex flex-wrap gap-2">
                                        @foreach($order->products as $orderItem)
                                            <a class="text-decoration-none text-black"
                                               href="{{ route('frontend.show',$orderItem->id) }}">
                                                <div class="card h-100" style="width: 19rem">
                                                    <div class="card-body d-flex flex-column">
                                                        <p>Name: {{ $orderItem->name }}</p>
                                                        <p>Price per item: &euro; {{ $orderItem->price }}</p>
                                                        <p>Total price: &euro; {{ $orderItem->price * $orderItem->pivot->quantity}}</p>
                                                        <p>Color: {{ implode(' / ', $orderItem->colors->pluck('name')->toArray()) }}</p>
                                                        <p>Size: {{$sizes[$orderItem->pivot->size_id -1 ]->name}}</p>
                                                        <p>Quantity: {{$orderItem->pivot->quantity}}</p>
                                                        <div class="py-3 mt-auto">
                                                            <button class="btn-add-cart">More Info</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
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
