@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex w-100 justify-content-between">
            <h1 class="m-0">Edit | <strong>{{$product->name}}</strong></h1>
            <a href="{{route('products.index')}}" class="btn btn-primary m-2 rounded-pill">All Products</a>
        </div>
    </div>
    @if (session('alert'))
        <x-alert :type="session('alert')['type']" :message="session('alert')['message']">
            <x-slot name="title">Users</x-slot>
        </x-alert>
    @endif
    <div class="row my-2">
        <div class="col-6">
            <form action="{{action('App\Http\Controllers\ProductsController@update',$product->id)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <!-- name -->
                <div class="form-group mb-3">
                    <label for="name">Name:</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name"
                           value="{{$product->name}}">
                    @error('name')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <!-- price -->
                <div class="form-group mb-3">
                    <label for="price">Price:</label>
                    <input id="price" name="price" type="number" step="0.01" class="form-control" placeholder="Price"
                           value="{{$product->price}}">
                    @error('price')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <!-- Brands - categories - genders -->
                <div class="d-flex justify-content-around border border-1 my-3 py-3 bg-white">
                    <div class="form-group mb-3 d-flex flex-column">
                        <label>Brands:</label>
                        <div class="btn-group-vertical">
                            @foreach($brands as $brand)
                                <label>
                                    <input type="radio" name="brand_id" value="{{ $brand->id }}"
                                           autocomplete="off"
                                           @if($product->brand_id == $brand->id) checked @endif> {{ $brand->name }}
                                </label>
                            @endforeach
                        </div>
                        @error('brand_id')
                        <p class="text-danger fs-6">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3 d-flex flex-column">
                        <label>Categories:</label>
                        @foreach($productCategories as $productCategory)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$productCategory->id}}"
                                       id="category{{$productCategory->id}}" name="categories[]"
                                       @if($product->productcategories->contains($productCategory->id))
                                           checked
                                    @endif>
                                <label class="form-check-label"
                                       for="category{{$productCategory->id}}">{{$productCategory->name}}</label>
                            </div>
                        @endforeach
                        @error('categories')
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
                                           autocomplete="off"
                                           @if($product->gender_id == $gender->id) checked @endif> {{ $gender->name }}
                                </label>
                            @endforeach
                        </div>
                        @error('gender_id')
                        <p class="text-danger fs-6">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Colors & Sizes -->
                <div class="d-flex justify-content-around">
                    <div class="accordion pt-1 pb-3" id="accordionColors">
                        <p class="text-lg text-center font-weight-bold">Colors</p>
                        <div class="card">
                            <div class="card-header" id="headingColors">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse"
                                            data-target="#collapseColors" aria-expanded="true"
                                            aria-controls="collapseColors">
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
                                                   id="color{{$color->id}}" name="colors[]"
                                                   @foreach($product->colors as $productColor) @if($productColor->id == $color->id) checked @endif @endforeach >
                                            <label class="form-check-label"
                                                   for="color{{$color->id}}">{{$color->name}}</label>
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
                                    <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse"
                                            data-target="#collapseSizes" aria-expanded="false"
                                            aria-controls="collapseSizes">
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
                                                   id="size{{$size->id}}" name="sizes[]"  @foreach($product->sizes as $productSize) @if($productSize->id == $size->id) checked @endif @endforeach>
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
                    <label>Description:</label>
                    <textarea name="body" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                              style="height: 100px">{{($product->body)}}
            </textarea>
                    @error('body')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <!-- File -->
                <div class="form-group">
                    <input type="file" name="photo_id" id="ChooseFile">
                </div>
                <button type="submit" class="ml-auto btn btn-dark d-flex justify-content-end me-3">UPDATE</button>
            </form>
        </div>
        <div class="col-6">
            <img class="img-fluid img-thumbnail"
                 src="{{$product->photo ? asset($product->photo->file) : 'http://via.placeholder.com/400'}}"
                 alt="{{$product->name}}">
        </div>
    </div>
@endsection
