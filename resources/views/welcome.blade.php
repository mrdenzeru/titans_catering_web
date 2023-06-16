<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Titans Catering</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- bootstrap-css --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            .relative a {
                text-decoration: none;
                color: black;
                font-weight: 700;
            }

            .carousel h5, p {
                color: white;
                font-weight: 700
            }

            .carousel-control-prev {
                color: white;
            }
        </style>

    </head>
    <body class="">
        <div class="relative flex items-top justify-center">
            <div class="float-start fixed px-6 py-4 sm:block mx-3">
                <button type="button" class="btn btn-info">
                    <a href="{{ url('welcome') }}" class="text-lg">TITANS CATERING</a>
                </button>
            </div>
            
            @if (Route::has('login'))
                <div class="fixed px-6 py-4 sm:block float-end mx-3">
                    @auth
                        <button type="button" class="btn btn-primary">
                            <a href="{{ url('/home') }}" class="text-lg">Home</a>
                        </button>
                    @else
                        <button type="button" class="btn btn-success">
                            <a href="{{ route('login') }}" class="text-lg">Log in</a>
                        </button>
                        @if (Route::has('register'))                       
                            <button type="button" class="btn btn-warning">
                                <a href="{{ route('register') }}" class="text-lg">Register</a>
                            </button>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{ asset('assets/img/1.png') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ asset('assets/img/2.png') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{ asset('assets/img/3.png') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>
