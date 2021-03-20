@extends('frontend.layouts.master')

@section('title','Tukuemas || Login Page')

@section('content')
<div class="reglog container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6 back">
                <div class="card1 pb-5">
                    <div class="row"> <img src="/dist/img/logo.png" class="logo"> </div>
                    <div class="row px-5 justify-content-center mt-4 mb-5"> 
                        <h3 class="banner">Selamat Datang Kembali di Tukuemas</h3>
                        <p>Nikmati mudahnya transaksi emas secara syar'i, efisien, dan terpercaya</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="row px-3"> 
                            <label class="mb-1">
                                <h6  for="email" class="mb-0 text-sm">{{ __('E-Mail Address') }}</h6>
                            </label> 
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="row px-3"> 
                            <label class="mb-1">
                                <h6  for="password" class="mb-0 text-sm">{{ __('Password') }}</h6>
                            </label> 
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="row px-3 mb-4">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                {{ old('remember') ? 'checked' : '' }} 
                            >    
                            <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                    
                            </label>
                            </div>
                            
                            @if (Route::has('password.request'))
                                <a class="forgot-pass ml-auto mb-0 text-sm" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>    
                            @endif
                        </div>  
                        <div class="row mb-3 px-3"> 
                            <button type="submit" class="btn btn-primary text-center">
                                {{ __('Login') }}
                            </button> 
                        </div>
                        <div class="row mb-4 px-3"> 
                            <small class="font-weight-bold">Don't have an account? 
                                <a href="{{ route('register') }}" class="text-warning">Register</a>
                            </small> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- <div class="bg-yellow py-4">
                    <div class="row px-3">
                        <small class="ml-4 ml-sm-5 mb-2">Copyright &copy;Tukuemas 2021. All rights reserved.</small>
                    </div>
                </div> -->
    </div>
</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    @if (Route::has('password.request'))
                                    <a class="forgot-pass" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <a href="{{ route('register') }}" class="btn">Register</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
