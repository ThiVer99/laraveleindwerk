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
                <div class="form-group mb-3">
                    <label for="name">Name:</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name"
                           value="{{$product->name}}">
                    @error('name')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="price">Price:</label>
                    <input id="price" name="price" type="number" step="0.01" class="form-control" placeholder="Price"
                           value="{{$product->price}}">
                    @error('price')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-around border border-1 my-3 py-3 bg-white">
                    <div class="form-group mb-3 d-flex flex-column">
                        <label>Brands:</label>
                        <div class="btn-group-vertical">
                            @foreach($brands as $brand)
                                <label>
                                    <input type="radio" name="brand_id" value="{{ $brand->id }}"
                                           autocomplete="off" @if($product->brand_id == $brand->id) checked @endif> {{ $brand->name }}
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
                                <label class="form-check-label" for="category{{$productCategory->id}}">{{$productCategory->name}}</label>
                            </div>
                        @endforeach
                    @error('categories')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                    </div>
                    <!-- GENDERS -->
                    <div class="form-group mb3">
                        <label>Gender</label>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="men" value="men" name="gender[]" @if($product->men == 1) checked @endif>
                            <label class="form-check-label" for="men">Men</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="women" value="women" name="gender[]" @if($product->women == 1) checked @endif>
                            <label class="form-check-label" for="women">Women</label>
                        </div>
                        @error('gender')
                        <p class="text-danger fs-6">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>Body:</label>
            <textarea name="body" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                      style="height: 100px">{{($product->body)}}
            </textarea>
                    @error('body')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
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
