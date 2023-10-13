@extends('layouts.guest')

@section('main-content')
    <form method="POST" action="{{ route('register') }}" enctype='multipart/form-data'>
        @csrf

        <!-- Name -->
        <div>

            <label for="name">Name</label>

            <input type="text" id="name" name="name" value="{{old('name')}}">

        </div>

        <!-- Email Address -->
        <div class="mt-4">

            <label for="email">Email</label>

            <input type="email" id="email" name="email" value="{{old('email')}}" >

        </div>

        <!-- Password -->
        <div class="mt-4">

            <label for="password"> Password</label>

            <input type="password" id="password" name="password" >

        </div>

        <!-- Confirm Password -->
        <div class="mt-4">

            <label for="password_confirmation">Conferma Password</label>

            <input type="password" id="password_confirmation" name="password_confirmation">

        </div>

        {{-- restaurant name --}}
        <div class="mt-4">

            <label for="restaurant_name">nome ristorante</label>

            <input type="text" id="restaurant_name" name="restaurant_name" value="{{old('restaurant_name')}}">

        </div>

        {{-- restaurant address --}}
        <div class="mt-4">

            <label for="address">indirizzo</label>

            <input type="text" id="address" name="address" value="{{old('address')}}">

        </div>

        {{-- iva --}}
        <div class="mt-4">

            <label for="p_iva">partita iva</label>

            <input type="text" id="p_iva" name="p_iva" value="{{old('p_iva')}}">

        </div>

        {{-- restaurant image --}}
        <div class="mb-4">

            <label for="image" class="form-label">immagine ristorante</label>
      
            <input class="form-control" type="file" id="image" name="image" accept="image/" value="{{old('image')}}">
      
        </div>


        {{-- restaurant categories --}}
        <div class="mt-3 mb-3">

            <label class="form-label d-block">categorie</label>
      
            @forelse ($categories as $category )
      
            <div class="d-inline">
      
              <input 
              
                type="checkbox" 
      
                class="btn-check"
      
                id="category-{{$category ->id}}"
      
                value="{{$category ->id}}" 
      
                name="categories[]" 
      
                @if ( in_array($category ->id , old('categories', [])))
      
                checked
                    
                @endif
                
                >
      
              <label class="btn btn-outline-primary" for="category-{{$category ->id}}">
              
                {{$category->category}}
      
              </label>
            
            </div>
                
            @empty
      
            <div>
      
              nessuna categoria disponibile
      
            </div>
                
            @endforelse
      
          </div>
      
        {{-- LOGIN --}}
        <div>
            <a href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit">

                Register

            </button>

        </div>
    </form>
@endsection