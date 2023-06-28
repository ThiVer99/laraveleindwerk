@extends('layouts.app')

@section('content')
    <section class="vh-100 row bg-red">
        <div class="col-12 col-lg-4 position-absolute top-50 start-50 translate-middle">
            <h2 class="ff-rmv text-center text-white">Register</h2>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <!-- name -->
                <label class="text-white ff-rmv" for="name">Name:</label>
                <input id="name" type="text" class="my-2 form-control login-input @error('name') is-invalid @enderror"
                       name="name" value="{{old('name')}}" required autocomplete="name" placeholder="Name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-warning">{{ $message }}</strong>
                </span>
                @enderror
                <!-- email -->
                <label class="text-white ff-rmv" for="email">E-mail:</label>
                <input placeholder="Email" class="my-2 form-control login-input @error('email') is-invalid @enderror"
                       id="email" type="email" value="{{ old('email') }}" required autocomplete="email" name="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-warning">{{ $message }}</strong>
                </span>
                @enderror
                <!-- password -->
                <label class="ff-rmv text-white" for="pass">Password:</label>
                <input placeholder="Password"
                       class="my-2 form-control login-input @error('password') is-invalid @enderror" required
                       id="password" type="password" name="password" autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-warning">{{ $message }}</strong>
                </span>
                @enderror
                <!-- password repeat -->
                <input id="password-confirm" type="password" class="my-2 form-control login-input login"
                       name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                <!-- login -->
                <div class="form-group">
                    <label class="ff-rmv text-white my-2" for="pass">Profile Picture:</label>
                    <input type="file" name="photo_id" id="ChooseFile">
                    @error('photo_id')
                    <p class="text-warning fs-6">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="ff-rmv mt-3 btn btn-login">Register</button>
            </form>
        </div>
    </section>
@endsection
