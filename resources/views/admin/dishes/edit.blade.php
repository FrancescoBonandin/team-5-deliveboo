@extends('layouts.app')

@section('page-title', 'Modify')

@section('main-content')

<div class="container-sm">


    <form action="{{ route('dishes.update', ['dish'=>$dish->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="inputName" class="form-label">Nome del piatto</label>
        <span class="text-danger">*</span>
        <input type="text" class="form-control @error('name') is-invalid @enderror"  id="inputName" name="name" 
        placeholder="Inserisci il nome del tuo piatto..." value="{{old('name', $dish->name)}}" required max='70'>
    </div>
        @error('name')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror

<!-- Input ingredienti piatto -->
    
    <div class="mb-3">
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

    <div class="mb-3 container-sm">
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

    <div class="mb-3 container-sm">
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

    <div class="container-sm">
      <label for="image" class="form-label" >Immagine del piatto</label>
    </div>
    <div class="container-sm"> 
        @if($dish->image)
            @if ($dish->image)
                <img src="{{asset('/storage/'.$dish->image)}}" alt="{{$dish->name}}" class="w-25">
            @else
                
            @endif
                
        <div> 
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="remove_image" name="remove_image">
          <label class="form-check-label" for="remove_image">
            Cancella Immagine
        </label>
        </div>
        @endif
      <div class="container-sm">
      <label for="image" class="form-label" >Inserisci immagine</label>
      </div>
      <div class="input-group mb-3 container-sm">
      <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
      @error('image')
      <div class="alert alert-danger">
        {{$message}}
        @enderror
      </div>

<!-- Radio button disponibile -->

<div class="mb-3 container-sm">
        <label class="form-label d-block">Disponibilità</label>
        <div class="form-check form-check-inline">
            <label for="available">Disponibile</label>
            <input class="form-check-input" type="radio" name="available"
            id="available" value="1" @if(old('available'))
            checked
            @endif>
        </div>
        <div class="form-check form-check-inline">
            <label for="available"> Non Disponibile</label>
            <input class="form-check-input" type="radio" name="available"
            id="available" value="0" @if(old('available'))
            checked
            @endif>
        </div>
    </div>

<!-- Button submit Add -->

        <div class="container-sm">
            <button type="submit" class="btn btn-success">Update</button>
        </div>

    </form>
</div>

@endsection