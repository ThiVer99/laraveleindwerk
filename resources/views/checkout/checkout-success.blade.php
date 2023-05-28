@extends('layouts.app')
@section('content')
    <div class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1>SUCCESS</h1>
            <p>{{$customer->name}}</p>
        </div>
    </div>
@endsection
