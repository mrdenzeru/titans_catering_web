@extends('layouts.app')

@section('content')

<div class="container">
    <div class="cover">
      <div class="front">
        <img src="{{ asset('assets/img/5.png') }}" alt="">
        <div class="text">
            <a class="text-1" href="{{ url('/') }}">
                <h1>TitansCatering<span class="dot">.</span></h1>
            </a>
          <span class="text-2">Yummy!</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-boxes">
                <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>
                <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" class="form-control form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="text forget-text">

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                
                </div>
                
                <div class="button input-box">
                                    
                    <input type="submit" value="Sumbit">

                </div>   

                <div class="text sign-up-text">Don't have an account? <a href="{{ route('register') }}">Sigup now</a></div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

