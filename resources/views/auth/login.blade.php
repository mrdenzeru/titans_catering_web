@extends('layouts.app')

@section('content')

    <div class="vh-150 gradient-custom">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        
                        <div class="card-body p-5">

                            <div class="mb-md-2 mt-md-2 pb-2">

                                <h2 class="fw-bold mb-2 text-uppercase text-center">Login</h2>
                                <p class="text-white-50 mb-5 text-center">Please enter your login and password!</p> 

                                <form method="POST" action="{{ route('login') }}" class="form-outline form-white mb-4">
                                    @csrf

                                    <div class="form-outline form-white mb-4">

                                        <label for="email" class="text-left form-label">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="form-outline form-white mb-4">
                                       
                                            <label for="password" class="password-tag form-label">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                    </div>
                                    
                                    <div class="form-outline form-white mb-4 text-center">
                                        @if (Route::has('password.request'))
                                            <a class="text-white-50" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>

                                    <div class="text-center">
                                    
                                        <button type="submit" class="btn btn-outline-light btn-lg px-5">
                                            {{ __('Login') }}
                                        </button> 

                                    </div>                               

                                    <div class="icons-logo d-flex justify-content-center text-center mt-4 pt-1">
                                        <a href="#!" class="text-white"><i class="fa-brands fa-facebook"></i></a>
                                        <a href="#!" class="text-white"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="#!" class="text-white"><i class="fa-brands fa-google"></i></a>
                                    </div>
                                            
                                </form>

                                <div class="text-center">
                                    @if (Route::has('register'))
                                        <p class="mb-0">Don't have an account?
                                            <a class="text-white-50 fw-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </p>
                                    @endif
                                </div>

                            </div>
                        </div>
                            
                    </div>
                </div>    
            </div>    
        </div>
    </div>
</div>

@endsection

