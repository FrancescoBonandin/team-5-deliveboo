@extends('layouts.guest')

@section('main-content')
    <form method="POST" action="{{ route('login') }}" class="w-500px m-2 p-3 light-bg-card custom-shadow">
        @csrf

        <!-- Email Address -->
        <div class="form-floating">

            <input class="form-control rounded-pill px-3 deliveboo-primary-border"  type="email" id="email" name="email" placeholder="email" required>

            <label class="mx-2" for="email">Email <span class="text-danger">*</span></label>

            @error('email')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror

        </div>

        <!-- Password -->
        <div class="mt-4 form-floating">

            <input class="form-control rounded-pill px-3 deliveboo-primary-border"  type="password" id="password" name="password" placeholder="password" required>

            <label class="mx-2" for="password">Password <span class="text-danger">*</span> </label>

            @error('password')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror

        </div>

        <!-- Remember Me -->
        <div class="mt-4 mx-3 d-flex align-items-center">

            <input class="mx-1" id="remember_me" type="checkbox" name="remember">

            <label for="remember_me" class="">Ricorda accesso</label>

        </div>

        <div class="mt-4 d-flex justify-content-center">

            <button class="btn btn-primary w-25 mx-2 d-block py-2 text-uppercase" type="submit">accedi</button>

            <a class="btn btn-outline-warning py-2 mx-2  w-25 d-block text-uppercase text-decoration-none" href="{{ route('register') }}">registrati</a>

        </div>

        <div class="mt-4">

            @if (Route::has('password.request'))

            <div class="text-center p-2">

                <a class="fs-7  btn btn-outline-danger text-decoration-none " href="{{ route('password.request') }}">

                    {{ __('Password dimenticata ?') }}

                </a>

            @endif

            </div>

        </div>

    </form>

@endsection