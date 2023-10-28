@extends('layouts.app')

@section('page-title', 'Statistics')

@section('main-content')



    <div class="col-10">

      <div class="btn btn-primary my-4">

        <a class="text-reset text-decoration-none" href="{{ route('dashboard') }}">indietro</a>

      </div>

      <form action="{{ route('restaurant-statistics-search')}}" method="GET" enctype="multipart/form-data">
        @csrf

        <div class="card rounded-bottom-0">

          <label class="mb-2" for="year">
  
            Choose the year:
  
          </label>
  
          <select class="form-select mb-2 w-50" name="year" id="year">
            
            @foreach ($years as $year)
                
              <option @if ($year['year']==old('year')) selected @endif value="{{$year['year']}}">{{$year['year']}}</option>
  
            @endforeach
  
          </select>
  
          <button class="mb-2 btn btn-primary w-25" type='submit'>
            search
          </button>

        </div>
      </form>
      
      <div>
        <canvas style="background-color:white" id="myChart"></canvas>
      </div>
      
    </div>
    
    

 

<script>

  const data = @json($dataArray); // Converte i dati PHP in JSON
    
</script>

@endsection