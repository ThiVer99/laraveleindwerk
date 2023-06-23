@extends('layouts.app')
@section('content')
    @livewire('product-show',['product' => $product])
@endsection
