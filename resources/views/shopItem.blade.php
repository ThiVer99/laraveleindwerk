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
            <option selected>Select size</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="44">44</option>
            <option value="45">45</option>
        </select>
        <label class="pb-1" for="sizeSelect">Color:</label>
        <select class="form-select mb-4" name="size" id="colorSelect">
            <option selected>Select color</option>
            <option value="red/black">Red and Black</option>
            <option value="blue/white">Blue and White</option>
            <option value="green/black">Green and Black</option>
        </select>
        <p class="py-4">{{$product->body}}</p>
        @if($cart->where('id',$product->id)->count())
            <p>In cart</p>
        @else
            <form action="{{route('cart.store')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn-add-cart">Add to Cart</button>
            </form>
        @endif
    </div>
</div>
@endsection
