@extends('layouts.app')

@section('content')
    <section class="vh-100 row bg-red">
        <div class="col-12 col-lg-4 position-absolute top-50 start-50 translate-middle">
            <h2 class="ff-rmv text-center text-white">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label class="text-white ff-rmv" for="email">E-mail:</label>
                <input placeholder="Email" class="my-2 form-control login-input @error('email') is-invalid @enderror"
                       id="email" type="email" value="{{ old('email') }}" required autocomplete="email" name="email"
                       autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-warning">{{ $message }}</strong>
                </span>
                @enderror
                <label class="ff-rmv text-white" for="pass">Password:</label>
                <input placeholder="Password"
                       class="my-2 form-control login-input @error('password') is-invalid @enderror" required
                       id="password" type="password" name="password" autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-warning">{{ $message }}</strong>
                </span>
                @enderror
                <button type="submit" class="ff-rmv mt-3 btn btn-login">Log In</button>
            </form>
            <hr>
            <h3 class="ff-rmv text-center text-white">No account yet?</h3>
            <div class="text-center pt-2">
                <a class="btn btn-link text-white" href="{{ route('register') }}">
                    Click here to register
                </a>
            </div>
        </div>
    </section>
@endsection
