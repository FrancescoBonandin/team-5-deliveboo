@extends('layouts.app')

@section('page-title', 'Dish')

@section('main-content')

<div class="w-100 d-flex flex-wrap  h-100 ">

    <div class=" w-100 mb-4">

        <div class="btn btn-primary my-4">

            <a class="text-reset text-decoration-none" href="{{route('dishes.view')}}">indietro</a>

        </div>

    </div>

    <div class="container-sm  p-3 ">

        <!-- Card del singolo piatto -->
        <div class="light-bg-card p-2 w-75 d-flex m-auto flex-wrap justify-content-center">

            <div class="col-lg-4 col-sm-12 m-1  ">

        <!-- Nome e immagine -->
                <h5 class="text-center primary-bg-card p-1">{{$dish->name}} </h5>
                @if($dish->image)
                    <img src="{{asset('/storage/'.$dish->image)}}" alt="{{$dish->name}}" class="w-100 foto-frame rounded">
                    
                @else
                    <h6 class="">Immagine non disponibile</h6>
                @endif

            </div>

            <div class="col-lg col-sm-12 m-1  ">

                <!-- Ingrdienti e descrizione -->
                <div class="">
                    <h5 class="primary-bg-card p-1">Ingredienti :</h5>
                    <p class="card-text p-1"> {{$dish->ingredients}} </p>
                    <h5 class="primary-bg-card p-1">Descrizione del piatto: </h5>
                    <p class="card-text p-1">{{$dish->description}} </p>
                </div>

                <!-- Prezzo e disponibilità -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item m-1">Prezzo: € {{$dish->price}} </li>
                    @if($dish->available == true)
                        <li class="list-group-item m-1">Disponibile &#9989;</li>
                    @else 
                        <li class="list-group-item m-1"> Non disponibile &#10060;</li>
                    @endif
                </ul>

            </div>

            <!-- Bottoni di modifica e cancellazione -->
            <div class="col-lg col-sm-12  m-1 ">

                <div class="h-100  d-flex justify-content-center flex-wrap">

                    <a href="{{ route('dishes.edit',['dish'=>$dish->id])}}"  class="btn btn-warning m-1 align-self-center ">Modifica il piatto</a>
                    
                    <button type="submit" class="btn btn-danger m-1 align-self-center" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Cancella
                    </button>

                </div>
                
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
@endsection