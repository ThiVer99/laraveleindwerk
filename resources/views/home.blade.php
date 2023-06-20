@extends('layouts.app')

@section('content')
    <div class="vh-100" id="home-header">
        <img src="{{asset('../images/header.jpg')}}" class="img-fluid vw-100" alt="">
        <header class="vh-100 col-12 col-lg-8 offset-lg-2 position-relative">
            <div class="text-center position-absolute top-50 start-50 translate-middle">
                <a class="text-decoration-none text-white fs-320 lh-1 ff-pmr" href="#">as</a>
                <h1 class="ff-pmr text-white mt-2 mb-5">AWESOME SNEAKERS</h1>
                <a class="btn-main ff-rmv" href="{{route('frontend.shop')}}">SHOP NOW</a>
            </div>
        </header>
    </div>
    <section class="row" id="collections">
        <a class="col-12 col-lg-6 text-decoration-none text-white" href="{{route('frontend.shop', '?selectedGenders[0]=1')}}">
            <div class="row" id="menc">
                <header class="d-flex justify-content-center align-items-center">
                    <h2 class="text-center fs-1 ff-rmv">MEN COLLECTION</h2>
                </header>
            </div>
        </a>
        <a class="col-12 col-lg-6 text-decoration-none text-white" href="{{route('frontend.shop', '?selectedGenders[0]=2')}}">
            <div class="row" id="womenc">
                <header class="d-flex justify-content-center align-items-center">
                    <h2 class="text-center fs-1 ff-rmv">WOMEN COLLECTION</h2>
                </header>
            </div>
        </a>
    </section>
    <section class="row align-items-center justify-content-center" id="shoeshuffle">
        <div class="bg-black col-12 col-lg-2 text-center" id="salediv">
            <p class="text-white pb-2 ff-rmv">Final Sale 40%-60%</p>
            <a class="btn-main-border ff-rmv" href="{{route('frontend.shop')}}">SHOP SALE</a>
        </div>
    </section>
@endsection
