@extends('layouts.app')

@section('page-title', 'Dish')

@section('main-content')
    <div class="col-10">

        <div class="btn btn-primary my-4">

            <a class="text-reset text-decoration-none" href="{{ route('dishes.view') }}">indietro</a>
    
        </div>

        <!-- Card del singolo piatto -->
        <div class="card" >
    
            <!-- Nome e immagine -->
            <h4 class="card-title">{{ucfirst($dish->name)}} </h4>

            <div class="row">

                <div class="col-5">
    
                    @if($dish->image)
        
                        <img src="{{asset('/storage/'.$dish->image)}}" alt="{{$dish->name}}" class="img-fluid ">
                        
                    @else
                        <h6>Immagine non disponibile</h6>
                    @endif
    
                </div>
    
                <div class="col-7">
    
                    <!-- Ingrdienti e descrizione -->
                    <div class="card-body">

                        <div class="row mb-3">

                            <div class="col">
    
                                <h5>Ingredienti :</h5>

                                <p class="card-text"> {{$dish->ingredients}} </p>
    
                            </div>

                            <div class="col">
    
                                <h5>Descrizione del piatto: </h5>

                                <p class="card-text">{{$dish->description}} </p>
    
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col">

                                <h5>
                                    Prezzo: 
                                </h5>
    
                                <div>{{ str_replace(".",",",$dish->price)}} € </div>
    
                            </div>

                            <div class="col">
                                
                                <h5>
                                    Disponibilità: 
                                </h5>
    
                                @if($dish->available == true)
                                <div >Disponibile &#9989;</div>
                                @else 
                                <div > Non disponibile &#10060;</div>
                                @endif
    
                            </div>

                        </div>

                    {{-- </div> --}}
            
                        <!-- Prezzo e disponibilità -->
                        {{-- <ul class="list-group list-group-flush">
                            <li class="list-group-item">Prezzo: {{ str_replace(".",",",$dish->price)}} € </li>
                            @if($dish->available == true)
                                <li class="list-group-item">Disponibile &#9989;</li>
                            @else 
                                <li class="list-group-item"> Non disponibile &#10060;</li>
                            @endif
                        </ul> --}}
            
                        <!-- Bottoni di modifica e cancellazione -->
                    {{-- <div class="card-body"> --}}
                        <a href="{{ route('dishes.edit',['dish'=>$dish->id])}}"  class="btn btn-warning m-2">Modifica il piatto</a>
                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Cancella
                        </button>
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
                                                Sei sicuro di voler cancellare il piatto? 
                                            </div>
                                            <div class=" text-danger">
                                                (questa operazione sarà irreversibile)
                                            </div>
                                        </div>
                                    </div>
                                    <form  action="{{route('dishes.destroy',['dish'=>$dish->id])}}" method="POST">
                                        @csrf
                                        @method('Delete')
                                        <div class="modal-footer">
                                            <button type='submit' class="col-3 btn btn-danger">
                                                Cancella
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

            </div>
    
        </div>

    </div>
@endsection