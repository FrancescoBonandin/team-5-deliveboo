@extends('layouts.app')

@section('page-title', 'Dishes')

@section('main-content')

<div class="row">
    <div class="card">  
        <div class="col">
            <h1 class="card-title text-center">
            I tuoi piatti
            </h1>
        </div>

        <!-- Bottone del create -->
        <div class="col text-end">
            <a href="{{route('dishes.create')}}" class="btn btn-primary mb-2">Aggiungi un nuovo piatto</a>
        </div>
    </div>
</div>


<div class="row">
  <div class="col-sm-6">
    <div class="card">

        <!-- Lista dei piatti associati al ristorante -->
        @forelse(Auth()->user()->restaurant->dishes as $dish)
        <h5 class="card-title"> {{$dish->name}} </h5>
        <img src="{{$dish->image}} " alt="" class="w-50">

        <!-- Bottone di visualizzazione (show) -->
        <div class="card-body">
        <a href="{{ route('dishes.show',['dish'=>$dish->id])}}"  class="btn btn-info">Vedi i dettagli</a>

        <!-- Bottone di modifica (edit) -->
        <a href="{{ route('dishes.edit',['dish'=>$dish->id])}}"  class="btn btn-warning">Modifica</a>
        
        <!-- Bottone di eliminazione con modale-->
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
        @empty
        Nessun piatto presente
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection