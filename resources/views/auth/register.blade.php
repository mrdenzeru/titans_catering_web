@extends('layouts.app')

@section('content')

<div class="container">
    <div class="cover">
      <div class="front">
        <img src="{{ asset('assets/img/6.png') }}" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="form">
            <div class="title">Register</div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
        
                <div class="input-boxes">
                    <div class="input-box">
                    <i class="fas fa-user"></i>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">
        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>
        
                    <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>
        
                    <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password">
        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>
        
                    <div class="input-box">
        
                    <i class="fas fa-lock"></i>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        
                    </div>
        
                    <div class="button input-box">
                        
                    <input type="submit" value="Sumbit">
            
                    </div>
        
                    <div class="text sign-up-text">Already have an account? <a href="{{ route('login') }}">Login now</a></div>
        
                </div>
        
            </form>
        </div>
    </div>
</div>

@endsection

