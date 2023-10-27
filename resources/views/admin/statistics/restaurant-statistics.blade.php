@extends('layouts.app')

@section('page-title', 'Statistics')

@section('main-content')



    <div class="col-10">

      <form action="{{ route('restaurant-statistics-search')}}" method="GET" enctype="multipart/form-data">
        @csrf

        <label for="year">

          Choose the year:

        </label>

        <select name="year" id="year">
          
          @foreach ($years as $year)
              
            <option value="{{$year['year']}}">{{$year['year']}}</option>

          @endforeach

        </select>

        <button type='submit'>
          search
        </button>
      </form>
      
      <div>
        <canvas style="background-color:white" id="myChart"></canvas>
      </div>
      
    </div>
    
    

 

<script>

  const data = @json($dataArray); // Converte i dati PHP in JSON
    
</script>

@endsection