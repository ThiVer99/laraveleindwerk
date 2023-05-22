@extends('layouts.app')
@section('content')
    <section class="row" id="shop-header">
        <img alt="" class="img-fluid p-0" src="{{asset('./images/shopheader.jp')}}g">
        <header class="col-12 col-lg-10 offset-lg-1 m-auto">
            <h1 class="text-white d-none ff-rmv">Shop</h1>
        </header>
    </section>
    <div class="bg-white row justify-content-center">
        <section class="py-4 row col-12 col-lg-10 offset-lg-1">
            <div class="p-0 col-12 col-lg-2" id="filters">
                <header>
                    <h2 class="ff-rmv">Filter by</h2>
                </header>
                <hr>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <p class="accordion-header ff-rmv" id="flush-headingOne">
                            <button aria-controls="flush-collapseOne" aria-expanded="false"
                                    class="accordion-button collapsed ps-0"
                                    data-bs-target="#flush-collapseOne" data-bs-toggle="collapse" type="button">
                                Price
                            </button>
                        </p>
                        <div aria-labelledby="flush-headingOne" class="accordion-collapse collapse"
                             data-bs-parent="#accordionFlushExample"
                             id="flush-collapseOne">
                            <div class="accordion-body"><input class="form-range" id="customRange3" step="1" type="range">
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <p class="accordion-header ff-rmv" id="flush-headingTwo">
                            <button aria-controls="flush-collapseTwo" aria-expanded="false"
                                    class="accordion-button collapsed ps-0"
                                    data-bs-target="#flush-collapseTwo" data-bs-toggle="collapse" type="button">
                                Color
                            </button>
                        </p>
                        <div aria-labelledby="flush-headingTwo" class="accordion-collapse collapse"
                             data-bs-parent="#accordionFlushExample"
                             id="flush-collapseTwo">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input class="form-check-input" id="colorGreen" type="checkbox" value="option1">
                                    <label class="ff-rmv" for="colorGreen">Green</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="colorBlue" type="checkbox" value="option2">
                                    <label class="ff-rmv" for="colorBlue">Blue</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="colorWhite" type="checkbox" value="option3">
                                    <label class="ff-rmv" for="colorWhite">White</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="colorBlack" type="checkbox" value="option4">
                                    <label class="ff-rmv" for="colorBlack">Black</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="colorGrey" type="checkbox" value="option5">
                                    <label class="ff-rmv" for="colorGrey">Grey</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <p class="accordion-header ff-rmv" id="flush-headingThree">
                            <button aria-controls="flush-collapseThree" aria-expanded="false"
                                    class="accordion-button collapsed ps-0"
                                    data-bs-target="#flush-collapseThree" data-bs-toggle="collapse"
                                    type="button">
                                Size
                            </button>
                        </p>
                        <div aria-labelledby="flush-headingThree" class="accordion-collapse collapse"
                             data-bs-parent="#accordionFlushExample"
                             id="flush-collapseThree">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input class="form-check-input" id="size1" type="checkbox" value="option1">
                                    <label class="ff-rmv" for="size1">40</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="size2" type="checkbox" value="option2">
                                    <label class="ff-rmv" for="size2">41</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="size3" type="checkbox" value="option3">
                                    <label class="ff-rmv" for="size3">42</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="size4" type="checkbox" value="option4">
                                    <label class="ff-rmv" for="size4">43</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="size5" type="checkbox" value="option5">
                                    <label class="ff-rmv" for="size5">44</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-10 d-flex flex-wrap justify-content-center" id="content">
                @foreach($products as $product)
                <a class="text-decoration-none text-black" href="{{route('frontend.show',$product->id)}}">
                    <div class="card m-2" style="width: 19rem">
                        <img alt="shoe" class="card-img-top" src="{{asset($product->photo->file)}}">
                        <div class="card-body">
                            <h3 class="card-title">{{$product->name}}</h3>
                            <p class="card-text">&euro; {{$product->price}}</p>
                            <div class="py-3">
                                <a class="btn-add-cart" href="shoppingCart.html">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
<!--                <a class="text-decoration-none text-black" href="shopItem.html">
                    <div class="card m-2" style="width: 19rem">
                        <img alt="shoe" class="card-img-top" src="{{asset('./images/shoe2.jpeg')}}">
                        <div class="card-body">
                            <h3 class="card-title">i'm a shoe!</h3>
                            <p class="card-text">€ 99.95</p>
                            <div class="py-3">
                                <a class="btn-add-cart" href="shoppingCart.html">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="text-decoration-none text-black" href="shopItem.html">
                    <div class="card m-2" style="width: 19rem">
                        <img alt="shoe" class="card-img-top" src="{{asset('./images/shoe3.jpeg')}}">
                        <div class="card-body">
                            <h3 class="card-title">i'm a shoe!</h3>
                            <p class="card-text">€ 179.95</p>
                            <div class="py-3">
                                <a class="btn-add-cart" href="shoppingCart.html">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="text-decoration-none text-black" href="shopItem.html">
                    <div class="card m-2" style="width: 19rem">
                        <img alt="shoe" class="card-img-top" src="{{asset('./images/shoe4.jpeg')}}">
                        <div class="card-body">
                            <h3 class="card-title">i'm a shoe!</h3>
                            <p class="card-text">€ 169.95</p>
                            <div class="py-3">
                                <a class="btn-add-cart" href="shoppingCart.html">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="text-decoration-none text-black" href="shopItem.html">
                    <div class="card m-2" style="width: 19rem">
                        <img alt="shoe" class="card-img-top" src="{{asset('./images/shoe5.jpeg')}}">
                        <div class="card-body">
                            <h3 class="card-title">i'm a shoe!</h3>
                            <p class="card-text">€ 149.95</p>
                            <div class="py-3">
                                <a class="btn-add-cart" href="shoppingCart.html">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </a>-->
            </div>
            {{$products->links()}}
        </section>
    </div>
@endsection
