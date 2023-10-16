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

                    <div class="card accordion ">

                        
                        <div class="accordion-item">

                            <div class="accordion-header" id="heading{{$loop->index}}">

                                <div class='card-title rowaccordion-header' id="heading{{$loop->index}}">

                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$loop->index}}">
                                        
                                        <h4 class='col'>
                                            Cliente: {{$order->name}} {{$order->last_name}}
                                        </h4>
                
                                        <h4 class='col'>
                                            Num.Ordine: {{$order->id}}
                                        </h4>

                                    </button>
                                
                                </div>

                            </div>

                            <div id="collapse{{$loop->index}}" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
                                

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
                                                    Ingredients: {{$dish->ingredients}}
                                                </h4>
        
                                                <h4>
                                                    Description: {{$dish->description}}
                                                </h4>
        
                                                <h4>
        
                                                <span>Partial Price:</span>
                                                
                                                    @if(isset(explode('.',$dish->price*$dish->pivot->quantity)[1]) && count(str_split(explode('.',$dish->price*$dish->pivot->quantity)[1]),1)==1)

                                                        {{ str_replace('.',',', $dish->price*$dish->pivot->quantity).'0';}}

                                                    @elseif (!isset(explode('.',$dish->price*$dish->pivot->quantity)[1]) || count(str_split(explode('.',$dish->price*$dish->pivot->quantity)[1]),1)==0) 

                                                        {{ str_replace('.',',', $dish->price*$dish->pivot->quantity).'00';}}

                                                    @else

                                                        {{ str_replace('.',',', $dish->price*$dish->pivot->quantity);}}

                                                    @endif
                                               
                                                <span>€</span>    
        
                                                </h4>
        
                                            </div>
            
                                            
                                        </div>

                                    </div>

                                    @if ($loop->last)
                                        
                                        <div class="row">
                
                                            <h4 class='col '>
                                                Address:{{$order->address}}
                                            </h4>
                    
                                            <h4 class='col '>
                                                Total Price:{{str_replace('.',',',$order->total_price)}}€
                                            </h4>
                                            
                                        </div>
                                        
                                    @endif

                                    @empty
                                    nessun piatto associato
                                    @endforelse
                                        


                            </div>

                        </div>

                    </div>
                
                @endforeach
                    
                @endif
                
            </div>
            
        </div>

 
@endsection