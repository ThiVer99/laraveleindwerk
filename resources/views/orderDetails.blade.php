@extends('layouts.app')
@section('content')
    <section>
        <form action="{{route('frontend.checkout')}}" method="POST">
            @csrf
            <div class="bg-white row min-vh-100 d-flex justify-content-center">
                <div class="col-12 col-lg-10 row mt-5 pt-5">
                    <div class="col-12 col-lg-8 ff-rmv">
                        <h2>Order Details</h2>
                        <hr>
                        <div>
                            <label class="py-2" for="firstName">First Name:</label>
                            <input class="form-control" id="firstName" placeholder="First Name" type="text" name="firstName">
                        </div>
                        <div>
                            <label class="py-2" for="lastName">Last Name:</label>
                            <input class="form-control" id="lastName" placeholder="Last Name" type="text" name="lastName">
                        </div>
                        <div>
                            <label class="py-2" for="adres">Street & Number:</label>
                            <input class="form-control" id="adres" placeholder="Street & Number" type="text" name="adress">
                        </div>
                        <div>
                            <label class="py-2" for="postcode">Postcode:</label>
                            <input class="form-control" id="postcode" placeholder="Postcode" type="number" name="postalCode">
                        </div>
                        <div>
                            <label class="py-2" for="city">City:</label>
                            <input class="form-control" id="city" placeholder="City" type="text" name="city">
                        </div>
                        <div>
                            <label class="py-2" for="country">Country:</label>
                            <input class="form-control" id="country" placeholder="Country" type="text" name="Country">
                        </div>
                        <div>
                            <label class="py-2" for="email">Email:</label>
                            <input class="form-control" id="email" placeholder="Email" type="email" name="email">
                        </div>

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
                                    <button class="btn-checkout mb-4">Checkout</button>
                                <div class="accordion" id="accordionExample">
                                    <div class="discount-dropdown">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button text-dark" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                Enter discount code
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse"
                                             aria-labelledby="headingOne"
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
        </form>
    </section>
@endsection
