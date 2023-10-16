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
        
        <!-- Bottone di eliminazione -->
        <form action="{{ route('dishes.destroy',['dish'=>$dish->id])}}" method="POST"
        onsubmit="return confirm('Sei sicuro di voler cancellare il piatto?');">
        @csrf
        @method('DELETE')
            <button type="submit" class="btn btn-danger mt-2">
                Cancella
            </button>
        </form>
        @empty
        Nessun piatto presente
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection