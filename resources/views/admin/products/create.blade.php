@extends('layouts.admin')
@section('title')
    AS | Create Product
@endsection
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex">
            <h1 class="m-0">Create Products</h1>
            <a href="{{route('products.index')}}" class="btn btn-primary m-2 rounded-pill">All Products</a>
        </div>
    </div>
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <!-- name -->
        <div class="form-group mb-3">
            <input name="name" type="text" class="form-control" id="floatingInputValue" placeholder="Name">
            @error('name')
            <p class="text-danger fs-6">{{$message}}</p>
            @enderror
        </div>
        <!-- price -->
        <div class="form-group mb-3">
            <input name="price" type="number" step="0.01" class="form-control" placeholder="Price">
            @error('price')
            <p class="text-danger fs-6">{{$message}}</p>
            @enderror
        </div>
        <!-- Brands Categories Genders -->
        <div class="d-flex justify-content-around border border-1 my-3 py-3 bg-white">
            <!-- BRANDS -->
            <div class="form-group mb-3 d-flex flex-column">
                <label>Brands</label>
                <div class="btn-group-vertical">
                    @foreach($brands as $brand)
                        <label>
                            <input type="radio" name="brand_id" value="{{ $brand->id }}"
                                   autocomplete="off"> {{ $brand->name }}
                        </label>
                    @endforeach
                </div>
                @error('brand_id')
                <p class="text-danger fs-6">{{ $message }}</p>
                @enderror
            </div>
            <!-- CATEGORIES -->
            <div class="form-group mb3">
                <label>Categorieën</label>
                @foreach($productcategories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$category->id}}"
                               id="category{{$category->id}}" name="productcategories[]">
                        <label class="form-check-label" for="category{{$category->id}}">{{$category->name}}</label>
                    </div>
                @endforeach
                @error('productcategories')
                <p class="text-danger fs-6">{{$message}}</p>
                @enderror
            </div>
            <!-- GENDERS -->
            <div class="form-group mb-3 d-flex flex-column">
                <label>Genders</label>
                <div class="btn-group-vertical">
                    @foreach($genders as $gender)
                        <label>
                            <input type="radio" name="gender_id" value="{{ $gender->id }}"
                                   autocomplete="off"> {{ $gender->name }}
                        </label>
                    @endforeach
                </div>
                @error('gender_id')
                <p class="text-danger fs-6">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- Colors - Sizes -->
        <div class="d-flex justify-content-around">
            <div class="accordion pt-1 pb-3" id="accordionColors">
                <p class="text-lg text-center font-weight-bold">Colors</p>
                <div class="card">
                    <div class="card-header" id="headingColors">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseColors" aria-expanded="true" aria-controls="collapseColors">
                                Click to expand
                            </button>
                        </h2>
                    </div>
                    <div id="collapseColors" class="collapse" aria-labelledby="headingColors"
                         data-parent="#accordionColors">
                        <div class="card-body">
                            @foreach($colors as $color)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$color->id}}"
                                           id="color{{$color->id}}" name="colors[]">
                                    <label class="form-check-label" for="color{{$color->id}}">{{$color->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @error('colors')
                <p class="text-danger fs-6">{{$message}}</p>
                @enderror
            </div>
            <div class="accordion pt-1 pb-3" id="accordionSizes">
                <p class="text-lg text-center font-weight-bold">Sizes</p>
                <div class="card">
                    <div class="card-header" id="headingSizes">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseSizes" aria-expanded="false" aria-controls="collapseSizes">
                                Click to expand
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSizes" class="collapse" aria-labelledby="headingSizes"
                         data-parent="#accordionSizes">
                        <div class="card-body">
                            @foreach($sizes as $size)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$size->id}}"
                                           id="size{{$size->id}}" name="sizes[]">
                                    <label class="form-check-label" for="size{{$size->id}}">{{$size->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @error('sizes')
                <p class="text-danger fs-6">{{$message}}</p>
                @enderror
            </div>
        </div>
        <!-- Description -->
        <div class="form-group mb-3">
            <textarea name="body" class="form-control" placeholder="Description..." id="floatingTextarea2"
                      style="height: 100px"></textarea>
            @error('body')
            <p class="text-danger fs-6">{{$message}}</p>
            @enderror
        </div>
        <!-- File -->
        <div class="form-group">
            <input type="file" name="photo_id" id="ChooseFile">
            @error('photo_id')
            <p class="text-danger fs-6">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="ml-auto btn btn-dark d-flex justify-content-end me-3">ADD PRODUCTS</button>
    </form>
@endsection


