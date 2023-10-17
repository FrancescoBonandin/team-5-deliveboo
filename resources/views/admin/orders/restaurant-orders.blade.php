@extends('layouts.app')

@section('page-title', 'Orders')

@section('main-content')

<div class="w-100"> 

    <div class="btn btn-primary my-4">

        <a class="text-reset text-decoration-none" href="{{ route('dashboard') }}">indietro</a>

    </div>

    @if ( count(Auth()->user()->restaurant->orders->toArray()) > 0)
        
    <div id="carouselExample" class="carousel slide light-bg-card p-2 mx-3 mb-4 mt-2 custom-shadow">

        <div

        @if (count(Auth()->user()->restaurant->orders->toArray()) > 10)

        class="counter text-bg-light counter-r"

        @elseif(count(Auth()->user()->restaurant->orders->toArray()) < 5 )

        class="counter text-bg-light"

        @else

        class="counter text-bg-light counter-y"
            
        @endif

        >

            {{count(Auth()->user()->restaurant->orders->toArray())}}

        </div>

        <div class="carousel-inner">

            @for ($i = 0; $i < count(Auth()->user()->restaurant->orders->toArray()); $i++)

            @if ($i == 0)

            {{-- ------------------------------------------ --}}
                <div class="carousel-item active ">
                    
                    <div class="d-flex justify-content-center flex-wrap">

                        <div class="p-2 col-lg-3 col-md-12 col-sm-12">

                            <div class="my-1 mt-0 primary-bg-card p-2">

                                <h3>nome</h3>

                                <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['name'] }}</span>

                            </div>

                            <div class="my-1 primary-bg-card p-2">

                                <h3>cognome</h3>

                                <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['last_name'] }}</span>

                            </div>

                            <div class="my-1 primary-bg-card p-2">

                                <h3>indirizzo</h3>

                                <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['address'] }}</span>

                            </div>

                            <div class="my-1 primary-bg-card p-2">

                                <h3>telefono</h3>

                                <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['phone_number'] }}</span>

                            </div>

                            <div class="my-1 primary-bg-card p-2">

                                <h3>Data e orario</h3>

                                <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['date'] }}</span>

                                <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['time'] }}</span>

                            </div>

                            <div class="my-1 primary-bg-card p-2">

                                <h3>totale</h3>

                                <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['total_price'] }} &euro;</span>

                            </div>

                        </div>

                        <div class="col-lg-9 col-md-12 col-sm-12 display-foto-container">

                            @for ($index = 0; $index < count(Auth()->user()->restaurant->orders[$i]->dishes->toArray()); $index++) 

                                @php

                                $dishes = Auth()->user()->restaurant->orders[$i]->dishes->toArray()
                                
                                @endphp

                                @for ($index = 0; $index < count($dishes); $index++) 

                                    @php

                                    $dish = $dishes[$index]
                                    
                                    @endphp

                                    <div class="w-100 primary-bg-card p-2 my-2 d-flex justify-content-center flex-wrap">

                                        <div class="counter-frame">

                                            <span class="position-absolute top-50 start-50 translate-middle">{{$index+1}}</span>

                                        </div>

                                        <div class="col d-flex justify-content-around">

                                            <h4 class="align-self-center m-2 text-capitalize">{{$dish['name']}}</h4>

                                            <h5 class="align-self-center m-2">{{$dish['price']}} &euro;</h5>

                                        </div>

                                        <div class="col-xs-12">

                                            <img src="{{asset('/storage/'.$dish['image'])}}" class="foto-frame" alt="...">

                                        </div>

                                    </div>

                                @endfor    

                            @endfor 

                        </div>

                    </div>

                </div> 

            @else   

             {{-- ------------------------------------------ --}}

            <div class="carousel-item">

                <div class="d-flex justify-content-center flex-wrap">

                    <div class="p-2 col-lg-3 col-md-12 col-sm-12">

                        <div class="my-1 mt-0 primary-bg-card p-2">

                            <h3>nome</h3>

                            <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['name'] }}</span>

                        </div>

                        <div class="my-1 primary-bg-card p-2">

                            <h3>cognome</h3>

                            <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['last_name'] }}</span>

                        </div>

                        <div class="my-1 primary-bg-card p-2">

                            <h3>indirizzo</h3>

                            <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['address'] }}</span>

                        </div>

                        <div class="my-1 primary-bg-card p-2">

                            <h3>telefono</h3>

                            <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['phone_number'] }}</span>

                        </div>

                        <div class="my-1 primary-bg-card p-2">

                            <h3>Data e orario</h3>

                            <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['date'] }}</span>
                            <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['time'] }}</span>

                        </div>

                        <div class="my-1 primary-bg-card p-2">

                            <h3>totale</h3>

                            <span>{{Auth()->user()->restaurant->orders->toArray()[$i]['total_price'] }} &euro;</span>

                        </div>

                    </div>

                    <div class="col-lg-9 col-md-12 col-sm-12 display-foto-container">

                        @for ($index = 0; $index < count(Auth()->user()->restaurant->orders[$i]->dishes->toArray()); $index++) 

                            @php

                            $dishes = Auth()->user()->restaurant->orders[$i]->dishes->toArray()
                            
                            @endphp

                            @for ($index = 0; $index < count($dishes); $index++) 

                                @php

                                $dish = $dishes[$index]
                                
                                @endphp

                                <div class="w-100 d-flex primary-bg-card p-2 my-2 justify-content-center flex-wrap">

                                    <div class="counter-frame">

                                       <span class="position-absolute top-50 start-50 translate-middle">{{$index+1}}</span> 

                                    </div>

                                    <div class="col d-flex justify-content-around">

                                        <h4 class="align-self-center m-2 text-capitalize">{{$dish['name']}}</h4>

                                        <h5 class="align-self-center m-2">{{$dish['price']}} &euro;</h5>

                                    </div>

                                    <div class="col-xs-12 m-2">

                                        <img src="{{asset('/storage/'.$dish['image'])}}" class="foto-frame" alt="...">

                                    </div>

                                </div>

                            @endfor    

                        @endfor 

                    </div>

                </div>

            </div> 
                
            @endif

            @endfor
            
        </div>

        <button class="carousel-control-prev button-l " type="button" data-bs-target="#carouselExample" data-bs-slide="prev">

          <span class="visually-hidden">Previous</span>

        </button>

        <button class="carousel-control-next button-r" type="button" data-bs-target="#carouselExample" data-bs-slide="next">

          <span class="visually-hidden">Next</span>

        </button>

    </div>

    @else  


        <h1 class="deliveboo-green-t-color light-bg-card">

            non hai nessun ordine 

        </h1>

    

    @endif
 
@endsection