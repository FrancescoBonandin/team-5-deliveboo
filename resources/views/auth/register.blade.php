@extends('layouts.guest')

@section('main-content')
    <form method="POST" action="{{ route('register') }}" enctype='multipart/form-data' class="container d-flex w-700px justify-content-center flex-wrap light-bg-card p-2 m-2 custom-shadow">

        @csrf

        <div class="p-2 col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex flex-column justify-content-between container-md">

            <!-- Name -->
            <div class="form-floating">

                <input class="form-control rounded-pill px-3 deliveboo-primary-border @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="nome" value="{{old('name')}}" required max='255'>

                <label class="form-label mx-2" for="name">Name</label>

                @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror

            </div>

            <!-- Email Address -->
            <div class="mt-2 form-floating">

                <input class="form-control rounded-pill px-3 deliveboo-primary-border @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="email" value="{{old('email')}}" required max='319'>

                <label class="form-label mx-2" for="email">Email</label>

                @error('email')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror

            </div>

            <!-- Password -->
            <div class="mt-2 form-floating">

                <input class="form-control rounded-pill px-3 deliveboo-primary-border @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="password" required min='8'>

                <label class="form-label mx-2" for="password">Password</label>

                @error('password')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror

            </div>

            <!-- Confirm Password -->
            <div class="mt-2 form-floating">

                <input class="form-control rounded-pill px-3 deliveboo-primary-border" type="password" id="password_confirmation" name="password_confirmation" placeholder="password" required min='8'>

                <label class="form-label mx-2" for="password_confirmation">Conferma Password</label>

            </div>

            {{-- restaurant name --}}
            <div class="mt-2 form-floating">

                <input class="form-control rounded-pill px-3 deliveboo-primary-border @error('restaurant_name') is-invalid @enderror" type="text" id="restaurant_name" name="restaurant_name" placeholder="nome ristorante" value="{{old('restaurant_name')}}" required max="255">

                <label class="form-label mx-2" for="restaurant_name">Nome Ristorante</label>

                @error('restaurant_name')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror

            </div>

            {{-- restaurant address --}}
            <div class="mt-2 form-floating">

                <input class="form-control rounded-pill px-3 deliveboo-primary-border @error('adress') is-invalid @enderror" type="text" id="address" name="address" placeholder="indirizzo" value="{{old('address')}}" required max="255">

                <label class="form-label mx-2" for="address">Indirizzo</label>

                @error('adress')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror

            </div>

            {{-- iva --}}
            <div class="mt-2 form-floating">

                <input class="form-control rounded-pill px-3 deliveboo-primary-border @error('p_iva') is-invalid @enderror" type="text" id="p_iva" name="p_iva" placeholder="partita iva" value="{{old('p_iva')}}" required min="11" max="11">

                <label class="form-label mx-2" for="p_iva">Partita iva</label>

                @error('p_iva')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror

            </div>

        </div>

        <div class="p-2 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            
            {{-- restaurant image --}}
            <div class="mb-2 primary-bg-card p-2">

                <label for="image" class="form-label">Immagine Ristorante</label>
        
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/" value="{{old('image')}}">
                
                @error('image')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror

            </div>

            {{-- restaurant categories --}}
            <div class="mt-3 mb-3 primary-bg-card p-2">

                <label class="form-label d-block">Categorie</label>
        
                @forelse ($categories as $category )
        
                <div class="d-inline">
        
                    <input 
                    
                        type="checkbox" 
            
                        class="btn-check @error('categories.*') is-invalid @enderror"
            
                        id="category-{{$category ->id}}"
            
                        value="{{$category ->id}}" 
            
                        name="categories[]" 
            
                        @if ( in_array($category ->id , old('categories', [])))
            
                        checked
                            
                        @endif
                        
                    >
        
                    <label class="btn btn-outline-light m-2" for="category-{{$category ->id}}">
                    
                        {{$category->category_name}}
            
                    </label>

                    @error('categories.*')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                
                </div>
                    
                @empty
        
                <div>
        
                nessuna categoria disponibile
        
                </div>
                    
                @endforelse
        
            </div>
      
            {{-- LOGIN --}}
            <div>

                <a class="btn btn-outline-warning  w-100 py-2 my-2 text-decoration-none" href="{{ route('login') }}">

                    {{ __('Già registrato?') }}
                    {{ __('Clicca qui') }}

                </a>

                <button class="btn btn-primary w-100 py-2 my-2" type="submit">

                    Crea account

                </button>

            </div>

        </div>
    </form>
@endsection