<div>
    <div class="bg-white row min-vh-100 d-flex justify-content-center">
        <div class="col-12 col-lg-10 row mt-5 pt-5">
            <div class="col-12 col-lg-8 ff-rmv">
                <h2>My cart</h2>
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
                            <div class="col-4 offset-4 offset-lg-0 col-lg-3 py-3 py-lg-0">
                                <div class="d-flex align-items-center">
                                    <label>quantity: </label>
                                    <input wire:change="changeQuantity('{{$cartItem->rowId}}',{{$cartItem->id}},{{$cartItem->options->size->id}})" wire:model="quantity.{{$cartItem->id}}.{{$cartItem->options->size->id}}" class="form-control ms-2" type="number" min="1">
                                </div>
                                @error('quantity.' . $cartItem->id)
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-4 col-lg-2 py-3 py-lg-0">
                                <p>&euro; {{ $cartItem->price * $cartItem->qty }}</p>
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
                <div class="d-flex justify-content-between">
                    <p>subtotal:</p>
                    <p>&euro;{{ $subTotal }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>PH shipping: </p>
                    <p>&euro;5,00 PH</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>BTW:</p>
                    <p>&euro;{{$tax}}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>PH Discount code: "Leve Cercle"</p>
                    <p>-&euro;20,00 PH</p>
                </div>
                <hr>
                <div>
                    <div class="d-flex justify-content-between">
                        <h5>Total:</h5>
                        <p>&euro;{{$total}}</p>
                    </div>
                    @if(!$cartItems->isEmpty())
                    <form action="{{route('frontend.orderDetails')}}" method="GET">
                        @csrf
                        <button class="btn-checkout mb-4">Checkout</button>
                    </form>
                    <div class="accordion" id="accordionExample">
                        <div class="discount-dropdown">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button text-dark" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Enter discount code
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body d-flex">
                                    <input class="discount-input" type="text">
                                    <button class="btn-discount ms-2">Toepassen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
