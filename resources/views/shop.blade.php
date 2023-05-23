@extends('layouts.app')
@section('content')
    <section class="row" id="shop-header">
        <img alt="" class="img-fluid p-0" src="{{asset('./images/shopheader.jp')}}g">
        <header class="col-12 col-lg-10 offset-lg-1 m-auto">
            <h1 class="text-white d-none ff-rmv">Shop</h1>
        </header>
    </section>
    @livewire('shop-page')
@endsection
