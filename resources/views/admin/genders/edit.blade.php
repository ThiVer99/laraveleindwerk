@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex w-100 justify-content-between">
            <h1 class="m-0">Edit | <strong>{{$gender->name}}</strong></h1>
            <a href="{{route('genders.index')}}" class="btn btn-primary m-2 rounded-pill">All Genders</a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-12">
            <form action="{{route('genders.update', $gender->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <input name="name" type="text" class="form-control" id="floatingInputValue" placeholder="Title"
                           value="{{$gender->name}}">
                    @error('name')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="ml-auto btn btn-dark d-flex justify-content-end me-3">UPDATE</button>
            </form>
        </div>
    </div>
@endsection


