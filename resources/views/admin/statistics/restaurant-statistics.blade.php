@extends('layouts.app')

@section('page-title', 'Dishes')

@section('main-content')

<div class="w-100 position-relative ">

    <div>
      <canvas style="background-color:white" id="myChart"></canvas>
    </div>

</div>

<script>

  const data = @json($data); // Converte i dati PHP in JSON
    
</script>

@endsection