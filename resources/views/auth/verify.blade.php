@extends('layouts.app')

@section('content')
    <div class="container vh-100">
        <div class="row justify-content-center col-12 col-lg-4 position-absolute top-50 start-50 translate-middle text-white">
            <div class="col-md-8 text-center">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email then click the button below') }}
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="ff-rmv mt-3 btn btn-login">Request new verification email</button>
                        </form>
                    </div>

            </div>
        </div>
    </div>
@endsection
