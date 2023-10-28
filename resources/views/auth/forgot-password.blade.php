@extends('layouts.guest')

@section('main-content')

<div class="row justify-content-center">
    <div class="col-10">

        <div class="btn btn-primary my-4">

            <a class="text-reset text-decoration-none" href="{{ route('login') }}">indietro</a>
    
        </div>

        <div class='card p-3 custom-shadow '>
            
            <div class="mb-2 fs-5">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
        
            <form class="p-2" method="POST" action="{{ route('password.email') }}">
                @csrf
        
                <!-- Email Address -->
                <div class="mt-2 form-floating">

                    <input class="form-control rounded-pill w-50 px-3 deliveboo-primary-border @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="email" value="{{old('email')}}" required maxlength='319'>
    
                    <label class="form-label mx-2" for="email">Email <span class="text-danger">*</span></label>
    
                    @error('email')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
    
                </div>
        
                <div class="mt-4">
                    <button class='btn btn-warning' type="submit">
                        Email Password Reset Link
                    </button>
                </div>
            </form>
            
        </div>

    </div>
</div>
@endsection