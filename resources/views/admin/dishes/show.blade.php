@extends('layouts.app')

@section('page-title', 'Dish')

@section('main-content')
<div class="container-sm">

    <!-- Card del singolo piatto -->
    <div class="card" style="width: 18rem;">

    <!-- Nome e immagine -->
        <h5 class="card-title">{{$dish->name}} </h5>
        @if($dish->image)
            <img src="{{$dish->image}}" alt="{{$dish->name}}" class="card-img-top">
        @else
            <h6>Immagine non disponibile</h6>
        @endif

        <!-- Ingrdienti e descrizione -->
        <div class="card-body">
            <h5>Ingredienti :</h5>
            <p class="card-text"> {{$dish->ingredients}} </p>
            <h5>Descrizione del piatto: </h5>
            <p class="card-text">{{$dish->description}} </p>
        </div>

        <!-- Prezzo e disponibilità -->
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Prezzo: € {{$dish->price}} </li>
            @if($dish->available == true)
                <li class="list-group-item">Disponibile &#9989;</li>
            @else 
                <li class="list-group-item"> Non disponibile &#10060;</li>
            @endif
        </ul>
        
        <!-- Bottoni di modifica e cancellazione -->
        <div class="card-body">
            <a href="{{ route('dishes.edit',['dish'=>$dish->id])}}"  class="btn btn-warning m-2">Modifica il piatto</a>
            <form action="{{ route('dishes.destroy',['dish'=>$dish->id])}}" method="POST"
            onsubmit="return confirm('Sei sicuro di voler cancellare il piatto?');">
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-danger m-2">
                    Cancella
                </button>
            </form>
        </div>
    </div>
</div>
@endsection