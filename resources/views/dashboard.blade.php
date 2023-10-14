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
                        Questa è la tua dashboard da cui puoi controllare tutti i tuoi piatti e i tuoi ordini
                    </h3>


               
                </div>
            </div>
        </div>
        
        <div class="row">
                
            <div class="col-4">
                
                @forelse (Auth()->user()->restaurant->orders as $order)

                    <div class="card">
                        <a href="{{route('orders.view')}}">

                            <div class='card-title row'>
           
                                <h2 class='col'>
                                   Cliente: {{$order->name}} {{$order->last_name}}
                                </h2>
           
                                <h2 class='col'>
                                   Num.Ordine: {{$order->id}}
                                </h2>
                            
                            </div>
                            
                        </a>
       
                        <div class='card-body'>
       
                           @forelse ($order->dishes as $dish)
                               <div class='card'>
                                    <div class="card-body row">
       
                                        <div class="col-2">
                                           <img class="img-fluid" src="{{$dish->image}}" alt="">
                                        </div>
       
                                        <div class="col">
       
                                            <h3>
       
                                                <span>
                                                   
                                                   {{$dish->name}} 
       
                                                </span>
                                           
                                                <span>
                                                   x {{$dish->pivot->quantity}}
                                                </span>
       
                                            </h3>
       
                                            <h4>
                                               {{$dish->ingredients}}
                                            </h4>
       
                                            <h4>
                                               {{$dish->description}}
                                            </h4>
       
                                            <h4>
       
                                               Partial Price:
                                               {{ str_replace('.',',', $dish->price*$dish->pivot->quantity)}}€
       
                                            </h4>
       
                                        </div>
       
                                    </div>
                                </div>
                            @empty
                            nessun piatto associato
                            @endforelse
                           
                            <div class="row">
       
                               <h4 class='col '>
                                   Address:{{$order->address}}
                               </h4>
       
                               <h4 class='col '>
                                   Total Price:{{str_replace('.',',',$order->total_price)}}€
                               </h4>
       
                            </div>
                        </div>
                    </div>
                    
                    @empty
        
                        <h2>
                            Nessun ordine   
                        </h2>
        
                @endforelse

                

            </div>
            
            <div class="col-4">
                <div class="card">
                    <h2 class="card-title">
                        
                        dishes
                        
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