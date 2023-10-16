@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <h1 class="text-center text-success">
                        Ciao {{ Auth()->user()->name }}, 
                        Benvenut* da  {{Auth()->user()->restaurant->restaurant_name}}
                    </h1>

                    <h3>
                        Questa è la tua dashboard da cui puoi controllare tutti i tuoi ordini, i tuoi piatti e perfino le statistiche
                    </h3>


               
                </div>
            </div>
        </div>
        
        <div class="row">
                
            <div class="col-4">

                <div class="card">
                    <a href="{{route('orders.view')}}">

                        <h2 class="card-title">
                            
                            Orders
                            
                        </h2>

                        <h2>

                            {{count( Auth()->user()->restaurant->orders)}}
                            
                        </h2>
                            
                    </a>
                </div>

            </div>
            
            <div class="col-4">
                <div class="card">
                <a href="{{route('dishes.view')}}">
                    <h2 class="card-title">
                        
                        dishes
                        
                    </h2>

                        
                    <h2>
                        
                        {{count(Auth()->user()->restaurant->dishes)}}

                    </h2>

                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <h2 class="card-title">
                        statistics
                    </h2>
                </div>
            </div>


        </div>
@endsection