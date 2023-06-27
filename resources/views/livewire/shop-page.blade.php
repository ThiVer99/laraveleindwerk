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
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <!-- start price -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button accordion-custom collapsed ff-rmv-bold ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            Price
                        </button>
                    </h2>
                    <div wire:ignore.self id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <!-- start price -->
                        <div>
                            <input wire:model="minPrice" class="form-control my-2" type="number">
                            <span class="ff-rmv">between</span>
                            <input wire:model="maxPrice" class="form-control my-2" type="number">
                        </div>

                    </div>
                </div>
                <!-- end price -->
                <!-- start genders -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button accordion-custom collapsed ff-rmv-bold ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Genders
                        </button>
                    </h2>
                    <div wire:ignore.self id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div>
                            @foreach($genders as $gender)
                                <div class="form-check">
                                    <input wire:model="selectedGenders" class="form-check-input" id="gender{{$gender->id}}" type="checkbox"
                                           value="{{$gender->id}}">
                                    <label class="ff-rmv" for="gender{{$gender->id}}">{{$gender->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- end genders -->
                <!-- start categories -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button accordion-custom collapsed ff-rmv-bold ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Categories
                        </button>
                    </h2>
                    <div wire:ignore.self id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div>
                            @foreach($categories as $category)
                                <div class="form-check">
                                    <input wire:model="selectedCategories" class="form-check-input" id="category{{$category->id}}" type="checkbox"
                                           value="{{$category->id}}">
                                    <label class="ff-rmv" for="category{{$category->id}}">{{$category->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- end categories -->
                <!-- start brands -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button accordion-custom collapsed ff-rmv-bold ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Brands
                        </button>
                    </h2>
                    <div wire:ignore.self id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div>
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
                <!-- start colors -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFive">
                        <button class="accordion-button accordion-custom collapsed ff-rmv-bold ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                            Color
                        </button>
                    </h2>
                    <div wire:ignore.self id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                        @foreach($colors as $color)
                            <div class="form-check">
                                <input wire:model="selectedColors" class="form-check-input" id="color{{$color->name}}"
                                       type="checkbox" value="{{$color->id}}">
                                <label class="ff-rmv" for="color{{$color->name}}">{{$color->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- end colors -->
                <!-- start size -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingSix">
                        <button class="accordion-button accordion-custom collapsed ff-rmv-bold ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                            Sizes
                        </button>
                    </h2>
                    <div wire:ignore.self id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                        @foreach($sizes as $size)
                            <div class="form-check">
                                <input wire:model="selectedSizes" class="form-check-input" id="size{{$size->name}}" type="checkbox"
                                       value="{{$size->id}}">
                                <label class="ff-rmv" for="size{{$size->name}}">{{$size->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- end size -->
            </div>
        </div>
        <div class="col-12 col-lg-10">
            <div class="form-floating mb-3 mt-2">
                <input type="text" class="form-control shop-input-seach" id="searchProducts" placeholder="Search" wire:model="searchProduct">
                <label class="ff-rmv" for="searchProducts">Search</label>
            </div>
            <div class="d-flex flex-wrap justify-content-start align-items-stretch gap-2 pb-3"
                 id="content">
                @foreach($products as $product)
                    <a class="text-decoration-none text-black mx-auto mb-3"
                       href="{{ route('frontend.show',$product) }}">
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
        </div>

        {{$products->links()}}
    </section>
</div>
