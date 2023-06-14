<div class="bg-white row justify-content-center mx-auto">
    <section class="py-4 row col-12 col-lg-10 offset-lg-1">
        <div class="p-0 col-12 col-lg-2" id="filters">
            <header>
                <h2 class="ff-rmv">Filter by</h2>
            </header>
            <hr>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <!-- start brands -->
                <div class="accordion-item">
                    <p class="accordion-header ff-rmv" id="flush-headingFour">
                        <button aria-controls="flush-collapseFour" aria-expanded="false"
                                class="accordion-button collapsed ps-0"
                                data-bs-target="#flush-collapseFour" data-bs-toggle="collapse"
                                type="button">
                            Brand
                        </button>
                    </p>
                    <div aria-labelledby="flush-headingFour" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample"
                         id="flush-collapseFour">
                        <div class="accordion-body">
                            @foreach($brands as $brand)
                                <div class="form-check">
                                    <input wire:model="selectedBrands" class="form-check-input" id="brand{{$brand->id}}" type="checkbox"
                                           value="{{$brand->id}}">
                                    <label class="ff-rmv" for="brand{{$brand->id}}">{{$brand->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- end brands -->
                <!-- start price -->
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
                        <div class="accordion-body"><input class="form-range" id="customRange3" step="1"
                                                           type="range">
                        </div>
                    </div>
                </div>
                <!-- end price -->
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
                            @foreach($colors as $color)
                                <div class="form-check">
                                    <input wire:model="selectedColors" class="form-check-input" id="color{{$color->name}}" type="checkbox" value="{{$color->id}}">
                                    <label class="ff-rmv" for="color{{$color->name}}">{{$color->name}}</label>
                                </div>
                            @endforeach
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
                            @foreach($sizes as $size)
                                <div class="form-check">
                                    <input wire:model="selectedSizes" class="form-check-input" id="size{{$size->name}}" type="checkbox" value="{{$size->id}}">
                                    <label class="ff-rmv" for="size{{$size->name}}">{{$size->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-10 d-flex flex-wrap justify-content-start align-items-stretch gap-2 pb-3" id="content">
            @foreach($products as $product)
                <a class="text-decoration-none text-black mx-auto mb-3" href="{{ route('frontend.show',$product->id) }}">
                    <div class="card h-100" style="width: 19rem">
                        <img alt="shoe" class="card-img-top" src="{{ asset($product->photo->file) }}">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <p>by {{$product->brand->name}}</p>
                            <p>&euro; {{ $product->price }}</p>
                            <div class="py-3 mt-auto">
                                @if($cart->where('id',$product->id)->count())
                                    <p>In cart</p>
                                @else
                                    <form wire:submit.prevent="addToCart({{$product->id}})" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-add-cart">Add to Cart</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        {{$products->links()}}
    </section>
</div>
