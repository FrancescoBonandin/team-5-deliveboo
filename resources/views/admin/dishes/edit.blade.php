@extends('layouts.app')

@section('page-title', 'Modify')

@section('main-content')

<div class="container-sm  pb-3">

    <div class="btn btn-primary my-4 align-self-start ">

        <a class="text-reset text-decoration-none" href="{{route('dishes.view')}}">indietro</a>

    </div>

    <div class=" w-75 light-bg-card p-2  m-auto ">

        <form class="" action="{{ route('dishes.update', ['dish'=>$dish->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

    <!-- Input nome del piatto -->

        <div class="mb-3 primary-bg-card p-1">
            <label for="inputName" class="form-label">Nome del piatto</label>
            <span class="text-danger">*</span>
            <input type="text" class="form-control @error('name') is-invalid @enderror"  id="inputName" name="name" 
            placeholder="Inserisci il nome del tuo piatto..." value="{{old('name', $dish->name)}}" required maxlength='70'>
        </div>
            @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror

    <!-- Input ingredienti piatto -->
        
        <div class="mb-3 primary-bg-card p-1">
            <label for="inputingredients" class="form-label">Ingredienti del piatto</label>
            <span class="text-danger">*</span>
            <input type="text" class="form-control @error('ingredients') is-invalid @enderror" required id="inputingredients" name="ingredients" 
            placeholder="Inserisci gli ingredienti del tuo piatto..." value="{{old('ingredients', $dish->ingredients)}}" required>
        </div>
            @error('ingredients')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror

    <!-- Input descrizione piatto -->

        <div class="mb-3 primary-bg-card p-1">
            <label for="inputDescription" class="form-label" >Descrizione del piatto</label>
            <span class="text-danger">*</span>
            <textarea class="form-control @error('description') is-invalid @enderror" required placeholder="Inserisci la descrizione del tuo piatto.." id="inputDescription" style="height: 100px" 
            name="description" required>{{old('description', $dish->description)}}</textarea>
        </div>
            @error('description')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror

    <!-- Input prezzo piatto -->

        <div class="mb-3 primary-bg-card p-1">
            <label for="inputprice" class="form-label">Prezzo del piatto</label>
            <span class="text-danger">*</span>
            <input type="number" class="form-control @error('price') is-invalid @enderror" required id="inputprice" name="price" min="1" max="99.99" step=".01"
            placeholder="Inserisci il prezzo del tuo piatto..." value="{{old('price', $dish->price)}}" required>
        </div>
            @error('price')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror

    <!-- Input immagine piatto -->

        <label for="image" class="form-label primary-bg-card p-1" >Immagine del piatto</label>
        <div class="container-sm rounded primary-bg-card p-1"> 

        <!-- Se l'immagine è già presente la mostra -->

            @if($dish->image)
                @if ($dish->image)
                    <img src="{{asset('/storage/'.$dish->image)}}" alt="{{$dish->name}}" class="w-25">
                @endif  

        <!-- Se l'immagine è presente mostra il tasto di cancellazione -->

            <div class="form-check p-1">
                <input class="form-check-input mx-2" type="checkbox" value="1" id="remove_image" name="remove_image">
                <label class="form-check-label" for="remove_image">
                Cancella Immagine
                </label>
            </div>
            @endif

            <!-- Se l'immagine non è presente input di inserimento immagine -->
            
            <label for="image" class="form-label m-1 " >Inserisci immagine</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                @error('image')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            </div>
        </div>
        @enderror

    <!-- Radio button disponibile -->

        <div class="mb-3 container-sm  p-1">
            <label class="form-label d-block">Disponibilità</label>
            <div class="form-check form-check-inline">
                <label for="available  p-1">Disponibile</label>
                <input class="form-check-input" type="radio" name="available"
                id="available" value="1" @if(old('available',$dish->available) == $dish->available)
                checked
                @endif>
            </div>
            <div class="form-check form-check-inline ">
                <label for="available"> Non Disponibile</label>
                <input class="form-check-input" type="radio" name="available"
                id="available" value="0" @if(old('available', $dish->available) == $dish->available)
                checked
                @endif>
            </div>
        </div>

    <!-- Button submit Add -->

        <div class="m-auto">

            <button type="submit" class="btn btn-success m-auto">Aggiorna</button>

        </div>

        </form>

    </div>

</div>

@endsection