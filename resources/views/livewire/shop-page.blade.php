<div class="bg-white row justify-content-center mx-auto">
    <section class="py-4 row col-12 col-lg-10 offset-lg-1">
        <div class="p-0 col-12 col-lg-2" id="filters">
            <header>
                <h2 class="ff-rmv">Filter by</h2>
            </header>
            <div class="d-flex justify-content-center">
                <a class="ff-pmr text-decoration-none btn-clear-filters text-center" href="/shop">clear filters</a>
            </div>
            <hr>
            <p class="ff-rmv-bold">Sort By</p>
            <select wire:model="sortBy" class="form-select" aria-label="Sort By">
                <option value="new">New</option>
                <option value="highest">Highest price</option>
                <option value="lowest">Lowest Price</option>
            </select>
            <hr>
            <!-- start genders -->
            <div>
                <p class="ff-rmv-bold">Genders</p>
                @foreach($genders as $gender)
                    <div class="form-check">
                        <input wire:model="selectedGenders" class="form-check-input" id="gender{{$gender->id}}" type="checkbox"
                               value="{{$gender->id}}">
                        <label class="ff-rmv" for="gender{{$gender->id}}">{{$gender->name}}</label>
                    </div>
                @endforeach
            </div>
            <!-- end genders -->
            <hr>
            <!-- start brands -->
            <div>
                <p class="ff-rmv-bold">Brands</p>
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
                <p class="ff-rmv-bold">Price</p>
                <input wire:model="minPrice" class="form-control my-2" type="number">
                <span class="ff-rmv">tot</span>
                <input wire:model="maxPrice" class="form-control my-2" type="number">
            </div>
            <!-- end price -->
            <hr>
            <!-- start colors -->
            <div>
                <p class="ff-rmv-bold">Colors</p>
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
                <p class="ff-rmv-bold">Sizes</p>
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
                                    <button class="btn-add-cart">More Info</button>
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
