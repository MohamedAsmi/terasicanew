@extends('layouts.login_app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- verify --}}
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card primary-color-b">
                <div class="card-header col-6 m-auto"><img src="{{asset('img/login-logo.png')}}" alt="" style="width: 100%;"></div>
                <div class="card-header col-12 m-auto text-center primary-text-cl-w">
                    <h1><b>Kirjaudu</b></h1>
                </div>
               
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header form-control primary-color-b primary-text-cl"><h3 style="font-weight: bold;">Vahvista sähköpostiosoitteesi</h3></div>
                
                                <div class="card-body" style="background-color: #c4c4c4c4">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif
                
                                    {{ __('Ennen kuin jatkat, tarkista sähköpostistasi vahvistuslinkki.') }}
                                    {{ __('Jos et saanut sähköpostia') }}, <a href="{{ route('verification.resend') }}" style="color: #faa51a">{{ __('napsauta tästä pyytääksesi toista') }}</a>.
                                </div>
                            </div>
                        </div>
                    </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
