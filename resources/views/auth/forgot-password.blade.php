@extends('layouts.guest')

@section('main-content')


<div class="">



    <div class="">

        <div class="btn btn-primary my-4">

            <a class="text-reset text-decoration-none" href="{{route('login')}}">indietro</a>

        </div>
        
    </div>

    <div class="light-bg-card p-1 custom-shadow">
        
        <div class="primary-bg-card p-1 m-1 custom-shadow text-center">
            {{ __('Dimenticato la password? nessun problema, inserisci la tua email e ti verrá inviato un link per sceglierne una nuova .') }}
        </div>

        <form method="POST" action="{{ route('password.email') }}" class="d-flex aling-item-center flex-wrap justify-content-center ">
            @csrf

            <!-- Email Address -->
            <div class="col-lg-6 col-md-6  d-flex aling-item-center  justify-content-center my-1 ">
                <label for="email" class="align-self-center  mx-1">
                    Email
                </label>
                <input type="email" id="email" name="email" class="rounded-pill light-bg-card px-2 primary-border-card w-75" placeholder="ex deliveboo@gmail.com">
            </div>

            <div class="col-lg-6 col-md-6  d-flex justify-content-center my-1 p-1  ">
                <button type="submit" class="btn btn-primary">
                    Email Password Reset Link
                </button>
            </div>
        </form>

    </div>

</div>
@endsection