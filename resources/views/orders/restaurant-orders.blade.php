@extends('layouts.app')

@section('page-title', 'Orders')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card justify-content-center">

                <h1 class="card-title text-center">
                    I tuoi ordini
                </h1>
               
            </div>
        </div>
        
        <div class="row">
                
            <div class="col">

                @if (count(Auth()->user()->restaurant->orders)==0)

                    <h2>
                        Nessun ordine   
                    </h2>
                        
                @else

                @foreach (Auth()->user()->restaurant->orders as $order)

                    <div class="card">

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">

                                <h2 class="accordion-header" id="headingOne">

                                    <div class='card-title row'>

                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            
                                            <h4 class='col'>
                                                Cliente: {{$order->name}} {{$order->last_name}}
                                            </h4>
                    
                                            <h4 class='col'>
                                                Num.Ordine: {{$order->id}}
                                            </h4>

                                        </button>
                                    
                                    </div>

                                </h2>

                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    

                                    <div class='card-body accordion-body'>
            
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
            
                                                    Partial Price:{{ str_replace('.',',', $dish->price*$dish->pivot->quantity)}}€
            
                                                    </h4>
            
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
            
                                

                            </div>

                        </div>

                    </div>
                
                @endforeach
                    
                @endif
                
            </div>
            
        </div>

 
@endsection