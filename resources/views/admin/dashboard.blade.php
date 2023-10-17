@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')

    <div class="row">

        <div class="col light-bg-card mt-4 mb-6 s-secondary-border-color text-center">
           
            <h1 class="deliveboo-green-t-color">

                {{-- Ciao {{ Auth()->user()->name }},  --}}
                {{Auth()->user()->restaurant->restaurant_name}}

            </h1>

            <h3>

                Questa è la tua dashboard da cui puoi controllare tutti i tuoi ordini, i tuoi piatti e perfino le statistiche

            </h3>
    
        </div>
        
        <div class="row m-auto">
                
            <div class="col-lg-4 col-sm-12 p-2 hover-trigger">

                <a href="{{route('orders.view')}}">

                    <div class="card light-bg-card s-secondary-border-color p-2">

                        <div class="card-title-options">

                            <h2 class="d-inline card-title  fs-1 deliveboo-primary-t-color position-absolute top-50 start-50 translate-middle">
                                
                                Orders
                                
                            </h2>
                                    
                        </div>
                    
                        <div class="counter">

                            <div>

                                {{count( Auth()->user()->restaurant->orders)}}

                            </div>

                        </div>
                        
                        <div class="d-flex justify-content-center">

                            <img class="custom-logo" src="{{ Vite::asset('resources/img/pngwing.com-7.png')}}" alt="">

                        </div>

                    </div>

                </a>

            </div>
            
            <div class="col-lg-4 col-sm-12 p-2 hover-trigger">

                <a href="{{route('dishes.view')}}">

                    <div class="card light-bg-card s-secondary-border-color p-2">

                        <div class="card-title-options">

                            <h2 class="card-title deliveboo-primary-t-color fs-1 position-absolute top-50 start-50 translate-middle">
                            
                                Dishes
                                
                            </h2>

                        </div>
                        
                        {{-- <div>

                            {{count(Auth()->user()->restaurant->dishes)}}

                        </div> --}}

                        <div class="d-flex justify-content-center">

                            <img class="custom-logo" src="{{ Vite::asset('resources/img/pngwing.com-6.png')}}" alt="">

                        </div>

                    </div>

                </a>

            </div>

            <div class="col-lg-4 col-sm-12 p-2 hover-trigger">

                <a href="{{route('orders.view')}}">

                    <div class="card light-bg-card s-secondary-border-color p-2">

                        <div class="card-title-options">

                            <h2 class="card-title deliveboo-primary-t-color fs-1 position-absolute top-50 start-50 translate-middle">

                                Statistics

                            </h2>

                        </div>

                        <div class="d-flex justify-content-center">

                            <img class="custom-logo" src="{{ Vite::asset('resources/img/pngwing.com-8.png')}}" alt="">

                        </div>

                    </div>

                </a>

            </div>

        </div>

@endsection