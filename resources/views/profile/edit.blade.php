@extends('layouts.app')

@section('page-title', 'Profile Edit')

@section('main-content')
    
    <h2 class="">
        {{ Auth()->User()->name }}
    </h2>
    

    <div class="py-12">
        <div class=" mx-auto">
            <div class="p-4 ">
                <div class=" ">
                    <form method="POST" action="{{ route('profile.update', ['profile'=>Auth()->user()]) }}" enctype='multipart/form-data' class="container d-flex w-700px justify-content-center flex-wrap light-bg-card p-2 m-2 custom-shadow">

                        @csrf

                        @Method('PUT')
                
                        <div class="p-2 col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex flex-column justify-content-between container-md">
                
                            <!-- Name -->
                            <div class="form-floating">
                
                                <input class="form-control rounded-pill px-3 deliveboo-primary-border @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="nome" value="{{old('name',auth()->user()->name) }}" required maxlength='255'>
                
                                <label class="form-label mx-2" for="name">Name</label>

                                @error('name')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                
                            </div>
                
                            <!-- Email Address -->
                            <div class="mt-2 form-floating">
                
                                <input class="form-control rounded-pill px-3 deliveboo-primary-border @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="email" value="{{old('email', auth()->user()->email)}}" required maxlength='319'>
                
                                <label class="form-label mx-2" for="email">Email</label>

                                @error('email')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                
                            </div>
                
                            {{-- restaurant name --}}
                            <div class="mt-2 form-floating">
                
                                <input class="form-control rounded-pill px-3 deliveboo-primary-border @error('restaurant_name') is-invalid @enderror" type="text" id="restaurant_name" name="restaurant_name" placeholder="nome ristorante" value="{{old('restaurant_name', auth()->user()->restaurant->restaurant_name)}}" required maxlength='255'>
                
                                <label class="form-label mx-2" for="restaurant_name">Nome Ristorante</label>

                                @error('restaurant_name')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                
                            </div>
                
                            {{-- restaurant address --}}
                            <div class="mt-2 form-floating">
                
                                <input class="form-control rounded-pill px-3 deliveboo-primary-border @error('address') is-invalid @enderror" type="text" id="address" name="address" placeholder="indirizzo" value="{{old('address', auth()->user()->restaurant->address)}}" required maxlength='255'>
                
                                <label class="form-label mx-2" for="address">Indirizzo</label>

                                @error('address')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                
                            </div>
                
                            {{-- iva --}}
                            <div class="mt-2 form-floating">
                
                                <input class="form-control rounded-pill px-3 deliveboo-primary-border @error('p_iva') is-invalid @enderror" type="text" id="p_iva" name="p_iva" placeholder="partita iva" value="{{old('p_iva', auth()->user()->restaurant->p_iva)}}" required minlength='11' maxlength='11'>
                
                                <label class="form-label mx-2" for="p_iva">Partita iva</label>

                                @error('p_iva')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                
                            </div>
                
                        </div>

                        @if(auth()->user()->restaurant->image)
                            <div class=" ">  
                               @if (auth()->user()->restaurant->image)
                                   <img class="img-fluid" src="{{asset('/storage/'.auth()->user()->restaurant->image)}}" alt="{{auth()->user()->restaurant->name}}" class="w-25">
                               @endif
                               
                       
   
                               <div class="form-check">
                                   <input class="form-check-input" type="checkbox" value="1" id="remove_image" name="remove_image">
                                       <label class="form-check-label" for="remove_image">
                                           Cancella Immagine
                                       </label>
                               </div>

                            </div> 
                        @endif
                
                        <div class="p-2 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            
                            
                            {{-- restaurant image --}}
                            <div class="mb-2 primary-bg-card p-2">
                
                                <label for="image" class="form-label">Immagine Ristorante</label>
                        
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*" value="{{old('image', auth()->user()->restaurant->image)}}">

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

                        <button class="btn btn-primary w-100 py-2 my-2" type="submit">

                           Modifica
        
                        </button>
                        
                    </form>
                </div>
            </div>

            <section id="" class="my-5 ">
                <div class="">

                   @if (session('status'))
                       <div class='alert alert-success'>
                            Password modificata con successo
                       </div>
                   @endif

                    <form method="POST" action="{{ route('password.update') }}" class="container d-flex w-700px justify-content-center flex-wrap light-bg-card p-2 m-2 custom-shadow">
                        @csrf
                        @method('PUT')


                        <div>
                        
                            <!--Current Password -->
                            <div class="mt-2 form-floating">

                                <input class="form-control rounded-pill px-3 deliveboo-primary-border" type="password" id="current_password" name="current_password" placeholder="current password"  required minlength='8'>

                                <label class="form-label mx-2" for="password">Old Password</label>

                            </div>
                            
                            <!-- Password -->
                            <div class="mt-2 form-floating">

                                <input class="form-control rounded-pill px-3 deliveboo-primary-border" type="password" id="password" name="password" placeholder="new password"  required minlength='8'>

                                <label class="form-label mx-2" for="password">New Password</label>

                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-2 form-floating">

                                <input class="form-control rounded-pill px-3 deliveboo-primary-border" type="password" id="password_confirmation" name="password_confirmation" placeholder="confirm new password"  required minlength='8'>

                                <label class="form-label mx-2" for="password_confirmation">Conferma Password</label>

                            </div>

                            <button class="btn btn-primary w-100 py-2 my-2" type="submit">

                                Modifica Password
             
                             </button>

                        </div>

                    </form>
                </div>
            </section>

            <section id='deletion' class="my-5 ">
                <div class=" ">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Cancella account
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1">

                        <div class="modal-dialog">

                            <div class="modal-content">
                                
                                <div class="modal-header">
                                    <h5 class="modal-title"> Sei sicuro? </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    <div class=" text-danger">
                                        
                                        <div class=" text-warning">
                                            Sei sicuro di voler eliminare il profilo? 
                                        </div>

                                        <div class=" text-danger">
                                            *(questa operazione sarà irreversibile)*
                                        </div>

                                    </div>

                                    <form  action="{{route('profile.destroy',['profile'=>Auth()->User()])}}" method="POST">
                                        @csrf
                                        @method('Delete')

                                        <div class="mt-2 form-floating">

                                            <input class="form-control rounded-pill px-3 deliveboo-primary-border" type="password" id="delete-user-password" name="password" placeholder="new password"  required minlength='8'>
            
                                            <label class="form-label mx-2" for="password">Password</label>
            
                                        </div>

                                        <div class="modal-footer">
                                            
                                            <button type='submit' class="col-3 btn btn-danger">
                                                Delete
                                            </button>

                                            <button type="button" class="col-3 btn btn-success" data-bs-dismiss="modal">
                                                Annulla
                                            </button>

                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
