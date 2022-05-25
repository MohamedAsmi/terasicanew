@extends('layouts.login_app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card primary-color-b">
                <div class="card-header col-6 m-auto"><img src="{{asset('img/login-logo.png')}}" alt="" style="width: 100%;"></div>
                <div class="card-header col-12 m-auto text-center primary-text-cl-w">
                    <h1><b>Kirjaudu</b></h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-12 col-form-label primary-text-cl-w">Sähköpostiosoite</label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label primary-text-cl-w">Salasana</label>

                            <div class="col-md-12 password_show">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <i class="fa-solid fa-eye" attr="show"></i>
                                <i class="fa-solid fa-eye-slash" attr="hide" style="display: none;"></i>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label  primary-text-cl-w" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn primary-color col-12">
                                    <h3><b>{{ __('Kirjaudu') }}</b></h3>
                                </button>
                                <div class="row">
                                    <div class="col-12 mt-2">
                                        <a class="btn btn-outline-dark col-12 primary-color-g primary-text-cl-b" href="{{ route('login.google') }}" role="button" style="text-transform:none;">
                                            <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="{{asset('img/Google__G__Logo.png')}}" />
                                            Login with Google
                                        </a>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-12 mt-2">
                                    <a class="btn btn-primary col-12 primary-text-cl-b" href="{{ route('login.facebook') }}" role="button" style="text-transform:none;">
                                        <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="{{asset('img/icon_facebook.png')}}" /> Login with Facebook
                                        </a>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link text-center col-12 mt-5 primary-text-cl-w" href="{{ route('password.request') }}">
                                    {{ __('Unohtuiko salasana?') }}
                                </a>
                                @endif

                                <a class="btn btn-link text-center col-12 mt-3 primary-text-cl-w" href="{{ route('register') }}">Etkö ole vielä Terassikesässä?<br>Lisää terassi ilmaiseksi alustalle!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection