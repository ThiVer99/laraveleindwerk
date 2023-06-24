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
                        <div class="d-flex flex-column gap-2">
                            <div class="d-flex gap-2">
                                <div class="form-floating flex-grow-1">
                                    <input class="form-control @error('firstName') is-invalid @enderror" id="firstName" placeholder="First Name" type="text"
                                           name="firstName">
                                    <label class="py-2" for="firstName">First Name</label>
                                    @error('firstName')
                                    <p class="text-danger fs-6">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-floating flex-grow-1">
                                    <input class="form-control @error('lastName') is-invalid @enderror" id="lastName" placeholder="Last Name" type="text"
                                           name="lastName">
                                    <label class="py-2" for="lastName">Last Name</label>
                                    @error('lastName')
                                    <p class="text-danger fs-6">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <div class="form-floating flex-grow-1">
                                    <input class="form-control @error('address') is-invalid @enderror" id="adres" placeholder="Street" type="text" name="address">
                                    <label class="py-2" for="adres">Street</label>
                                    @error('address')
                                    <p class="text-danger fs-6">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-floating flex-grow-2">
                                    <input class="form-control @error('number') is-invalid @enderror" id="number" placeholder="Number" type="text" name="number">
                                    <label class="py-2" for="number">Number</label>
                                    @error('number')
                                    <p class="text-danger fs-6">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <div class="form-floating flex-grow-1">
                                    <input class="form-control @error('city') is-invalid @enderror" id="city" placeholder="City" type="text" name="city">
                                    <label class="py-2" for="city">City</label>
                                    @error('city')
                                    <p class="text-danger fs-6">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-floating flex-grow-2">
                                    <input class="form-control @error('postalCode') is-invalid @enderror" id="postcode" placeholder="Postcode" type="number"
                                           name="postalCode">
                                    <label class="py-2" for="postcode">Postcode</label>
                                    @error('postalCode')
                                    <p class="text-danger fs-6">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control @error('state') is-invalid @enderror" id="state" placeholder="State" type="text" name="state">
                                <label class="py-2" for="state">State</label>
                                @error('state')
                                <p class="text-danger fs-6">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input class="form-control @error('country') is-invalid @enderror" id="country" placeholder="Country" type="text" name="country">
                                <label class="py-2" for="country">Country</label>
                                @error('country')
                                <p class="text-danger fs-6">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" type="email" name="email">
                                <label class="py-2" for="email">Email</label>
                                @error('email')
                                <p class="text-danger fs-6">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
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
        </form>
    </section>
@endsection
