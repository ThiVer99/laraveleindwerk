@extends('layouts.app')
@section('content')
    <div class="row min-vh-100 px-1 py-4 d-flex align-items-center">
        <div class="col-12 col-lg-4 offset-lg-2">
            <img alt="shoe" class="img-fluid" src="{{$product->photo->file}}">
        </div>
        <div class="col-12 col-lg-4 ff-rmv">
            <h2 class="pb-4 ff-pmr">{{$product->name}}</h2>
            <p class="pb-2">&euro;{{$product->price}}</p>
            <label class="pb-1" for="sizeSelect">Size:</label>
            <select class="form-select mb-4" name="size" id="sizeSelect">
                @foreach($product->sizes as $size)
                    <option value="{{$size->id}}">{{$size->name}}</option>
                @endforeach
            </select>
            <label class="pb-1" for="sizeSelect">Color:</label>
            <select class="form-select mb-4" name="size" id="colorSelect">
                @foreach($product->colors as $color)
                    <option value="{{$color->id}}">{{$color->name}}</option>
                @endforeach
            </select>
            <p class="py-4">{{$product->body}}</p>
            @guest
                <hr>
                <p class="py-2">you need to sign in to order this product</p>
                <a href="{{ route('login') }}" class="btn-add-cart">Log in</a>
                <a href="{{ route('register') }}" class="btn-add-cart">Register</a>
            @endguest
            @auth
                @if($cart->where('id',$product->id)->count())
                    <p>In cart</p>
                @else
                    <form action="{{route('cart.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn-add-cart">Add to Cart</button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
@endsection
