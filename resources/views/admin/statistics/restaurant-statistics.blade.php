@extends('layouts.app')

@section('page-title', 'Statistics')

@section('main-content')
 
  <div class=" main-height-container  w-100 ">

      <div class="w-100 pt-3">

        <div class="btn btn-primary">

          <a class="text-reset text-decoration-none" href="{{ route('dashboard') }}">indietro</a>

        </div>

      </div>

      <div class="w-100 h-chart d-flex align-item-center">

        <div class=" w-75 m-auto h-100 h p-1 d-flex align-item-center flex-wrap ">

          <form class="w-100 m-auto p-1 " action="{{ route('restaurant-statistics-search')}}" method="GET" enctype="multipart/form-data">
            
            @csrf

            <div class="light-bg-card p-1 w-100 d-flex justify-content-around flex-wrap ">

              <div class="align-self-center d-flex justify-content-center flex-wrap align-item-center">

                <label class="light-bg-card p-1 m-1" for="year">

                  Seleziona l'anno :

                </label>

                <select class="align-self-center" name="year" id="year">
                  
                  @foreach ($years as $year)
                      
                    <option value="{{$year['year']}}">{{$year['year']}}</option>

                  @endforeach

                </select>

            </div>

              <button class="btn btn-success m-1 align-self-center" type='submit'>

                cerca
                
              </button>

            </div>

          </form>
        
          <div class="w-100 p-2 d-flex light-bg-card ">

            <canvas class="w-100 rounded align-self-center " style="background-color:white" id="myChart"></canvas>

          </div>

      </div>

    </div>
      
  </div>
    
    

 

<script>

  const data = @json($dataArray); // Converte i dati PHP in JSON
    
</script>

@endsection