<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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

                    <div class="collapse navbar-collapse" id="navbarText">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            @auth

                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="#">Link 2</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="#">Link 3</a>

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