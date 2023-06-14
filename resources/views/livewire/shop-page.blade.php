<div class="bg-white row justify-content-center mx-auto">
    <section class="py-4 row col-12 col-lg-10 offset-lg-1">
        <div class="p-0 col-12 col-lg-2" id="filters">
            <header>
                <h2 class="ff-rmv">Filter by</h2>
            </header>
            <hr>
            <!-- start brands -->
            <div>
                <p class="ff-rmv-bold">brands</p>
                @foreach($brands as $brand)
                    <div class="form-check">
                        <input wire:model="selectedBrands" class="form-check-input" id="brand{{$brand->id}}" type="checkbox"
                               value="{{$brand->id}}">
                        <label class="ff-rmv" for="brand{{$brand->id}}">{{$brand->name}}</label>
                    </div>
                @endforeach
            </div>
            <!-- end brands -->
            <hr>
            <!-- start price -->
            <div>
                <p class="ff-rmv-bold">price</p>
                <input wire:model="minPrice" class="form-control my-2" type="number">
                <span class="ff-rmv">tot</span>
                <input wire:model="maxPrice" class="form-control my-2" type="number">
            </div>
            <!-- end price -->
            <hr>
            <!-- start colors -->
            <div>
                <p class="ff-rmv-bold">colors</p>
                @foreach($colors as $color)
                    <div class="form-check">
                        <input wire:model="selectedColors" class="form-check-input" id="color{{$color->name}}"
                               type="checkbox" value="{{$color->id}}">
                        <label class="ff-rmv" for="color{{$color->name}}">{{$color->name}}</label>
                    </div>
                @endforeach
            </div>
            <!-- end colors -->
            <hr>
            <!-- start sizes -->
            <div>
                <p class="ff-rmv-bold">sizes</p>
                @foreach($sizes as $size)
                    <div class="form-check">
                        <input wire:model="selectedSizes" class="form-check-input" id="size{{$size->name}}" type="checkbox"
                               value="{{$size->id}}">
                        <label class="ff-rmv" for="size{{$size->name}}">{{$size->name}}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-12 col-lg-10 d-flex flex-wrap justify-content-start align-items-stretch gap-2 pb-3"
             id="content">
            @foreach($products as $product)
                <a class="text-decoration-none text-black mx-auto mb-3"
                   href="{{ route('frontend.show',$product->id) }}">
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
