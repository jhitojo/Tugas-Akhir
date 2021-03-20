@extends('frontend.layouts.master')

@section('title','Tukuemas || Register Page')

@section('content')
<div class="reglog container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6 back">
                <div class="card1 pb-5">
                    <div class="row"> <img src="/dist/img/logo.png" class="logo"> </div>
                    <div class="row px-5 justify-content-center mt-4 mb-5"> 
                        <h3 class="banner">Selamat Datang di Tukuemas</h3>
                        <p>Bergabung sekarang dan raihlah keuntungan dari berbisnis emas</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                        <div class="row px-3"> 
                            <label for="name" class="mb-0 text-sm">{{ __('Name') }}</label>
                            <!-- <div class="col-md-6"> -->
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="row px-3"> 
                            <label for="email" class="mb-0 text-sm">{{ __('E-Mail Address') }}</label>
                            <!-- <div class="col-md-6"> -->
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row px-3 mb-4">
                            <label for="password-confirm" class="mb-0 text-sm">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>  
                        <div class="row mb-3 px-3"> 
                        <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



