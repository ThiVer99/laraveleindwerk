<div>
    <div class="bg-white row min-vh-100 d-flex justify-content-center">
        <div class="col-12 col-lg-10 row mt-5 pt-5">
            <div class="col-12 col-lg-8 ff-rmv">
                <div class="d-flex justify-content-between">
                    <h2>My cart</h2>
                    @if(!$cartItems->isEmpty())
                        <button class="btn-clear-cart" wire:click="clearCart">clear all</button>
                    @endif
                </div>
                <hr>
                @if(!$cartItems->isEmpty())
                    @foreach($cartItems as $cartItem)
                        <div class="row py-4 position-relative">
                            <div class="col-4 col-lg-2">
                                <a href="{{ route('frontend.show',$cartItem->id) }}">
                                    <img alt="shoe" class="img-fluid border-cart-item"
                                         src="{{$cartItem->model->photo->file}}">
                                </a>
                            </div>
                            <div class="col-8 col-lg-4 row align-items-center">
                                <p>{{ $cartItem->name }}</p>
                                <p>Price: &euro; {{ $cartItem->price }}</p>
                                <p>Size: {{ $cartItem->options->size->name }}</p>
                                <p class="m-0">Color: {{ implode('/', $cartItem->model->colors->pluck('name')->toArray()) }}</p>
                            </div>
                            <div class="col-8 offset-4 offset-lg-0 col-lg-3 py-3 py-lg-0">
                                <div class="d-flex align-items-center">
                                    <label>quantity: </label>
                                    <input wire:change="changeQuantity('{{$cartItem->rowId}}',{{$cartItem->id}},{{$cartItem->options->size->id}})" wire:model="quantity.{{$cartItem->id}}.{{$cartItem->options->size->id}}" class="form-control ms-2" type="number" min="1">
                                </div>
                                @error('quantity.' . $cartItem->id)
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-8 offset-4 offset-lg-0 col-lg-2 py-3 py-lg-0">
                                <p>&euro;{{ $cartItem->price * $cartItem->qty }}</p>
                            </div>
                            <div class="col-2 offset-9 offset-lg-0 col-lg-1 cart-delete">
                                <button wire:click="remove('{{$cartItem->rowId}}')" type="submit" class="btn-delete">X</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No items in cart</p>
                @endif
                <hr>
            </div>
            <div class="col-12 col-lg-4 ff-rmv">
                <h2>Order summary</h2>
                <hr>
                <div>
                    <div class="d-flex justify-content-between">
                        <h5>Total:</h5>
                        <p>&euro;{{$subTotal}}</p>
                    </div>
                    @if(!$cartItems->isEmpty())
                    <form action="{{route('frontend.orderDetails')}}" method="GET">
                        @csrf
                        <button class="btn-checkout mb-4">Checkout</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
