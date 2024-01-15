<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="shortcut icon" type="image/x-icon" href="{{Vite::asset('resources/img/favicon (1).ico')}}">

        <!-- Scripts -->
        @vite('resources/js/app.js')

    </head>
    <body class="full-screen-container">

        <header class="custom-shadow">

            <nav class=" nav-height-container navbar pt-4 pb-4 navbar-expand-lg bg-body-white">

                <div class="container">

                    <div class="d-flex align-items-center navbar-brand">

                        <div class="w-50px">

                            <img class="w-100" src="{{ Vite::asset('resources/img/deliveboo-logo.png')}}" alt="">

                        </div>

                        <div class="mx-2">

                            <h1 class="deliveboo-primary-t-color">
                                deliveboo
                            </h1>

                        </div>

                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">

                        <span class="navbar-toggler-icon"></span>

                    </button>

                    <div class="collapse navbar-collapse  w-75 " id="navbarText">

                        <ul class="navbar-nav me-auto d-flex justify-content-end mb-2 mb-lg-0 w-100">

                            <li class="nav-item">

                                 <a class="nav-link  deliveboo-primary-t-color" href="http://localhost:5176">Ordina dal tuo ristorante preferito <i class="fa-solid fa-utensils  "></i></a>

                            </li>

                            @auth

                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>

                                </li>
    
                            @endauth

                        </ul>

                        @auth
                            <form method="POST" action="{{ route('logout') }}">

                                @csrf

                                <button type="submit" class="btn btn-outline-danger">Log Out</button>

                            </form>

                        @endauth

                    </div>

                </div>

            </nav>

        </header>

        <main  class="main-bg-image main-height-container d-flex align-items-center justify-content-center">

            <div class="container d-flex justify-content-center">

                @yield('main-content')

            </div>

        </main>

    </body>

</html>