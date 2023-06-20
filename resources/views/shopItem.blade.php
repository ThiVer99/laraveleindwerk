@extends('layouts.app')
@section('content')
    @if(session('message'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{$product->name}} added to cart',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif
    <div class="row min-vh-100 px-1 py-4 d-flex align-items-center">
        <div class="col-12 col-lg-4 offset-lg-2">
            <img alt="shoe" class="img-fluid" src="{{$product->photo->file}}">
        </div>
        <div class="col-12 col-lg-4 ff-rmv">
            <form action="{{route('cart.store')}}" method="POST">
                @csrf
                <h2 class="pb-4 ff-pmr">{{$product->brand->name}} - {{$product->name}}</h2>
                <p class="pb-2">{{$product->gender->name}}</p>
                <p class="pb-2">&euro;{{$product->price}}</p>
                <label class="pb-1" for="sizeSelect">Size:</label>
                <select class="form-select mb-4" name="size" id="sizeSelect">
                    @foreach($product->sizes as $size)
                        <option value="{{$size->id}}">{{$size->name}}</option>
                    @endforeach
                </select>
                <p>color:  {{ implode('/', $product->colors->pluck('name')->toArray()) }}</p>
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
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn-add-cart">Add to Cart</button>
                    @endif
                @endauth
            </form>
        </div>
    </div>
@endsection
