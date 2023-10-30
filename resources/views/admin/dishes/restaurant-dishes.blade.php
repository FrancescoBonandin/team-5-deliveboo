@extends('layouts.app')

@section('page-title', 'Dishes')

@section('main-content')

<div class="w-100 position-relative ">

    <div class="d-flex  justify-content-between align-items-center">

        <div class="btn btn-primary my-4">

            <a class="text-reset text-decoration-none" href="{{ route('dashboard') }}">indietro</a>
    
        </div>
    
        <div class="my-4">
    
            <a class="btn btn-success" href="{{ route('dishes.create')}}">+</a>
    
        </div>

    </div>

    <div class="row aling-item-center display-dishes-container light-bg-card p-2 mx-3 mb-4 mt-3 custom-shadow position-relative">

        @forelse (Auth()->user()->restaurant->dishes as $dish)
            
        <div class="col-12 primary-bg-card my-2 d-flex justify-content-center align-item-center flex-wrap">
            
            <div class="col-lg-8 col-md-12 my-3 p-2 light-bg-card">

                <div class="row">

                    <div class="col-lg-4 col-md-3 col-sm-12 text-center align-self-center">

                        <h5 class="card-title text-capitalize"> {{$dish->name}}</h5>
        
                    </div>
        
                    <div class="col-lg-4 col-md-3 col-sm-12 p-3 align-self-center  text-center">

                        <h6 class="card-title text-uppercase">descrizione :</h6>
        
                        <p class="">{{$dish->description}}</p>
        
                    </div>
        
                    <div class="col-lg-4 col-md-4 col-sm mx-auto ">
        
                        <img src="{{asset('/storage/'.$dish->image)}}" alt="" class=" w-100 foto-frame ">
        
                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-md-12 d-flex justify-content-center">

                <div class="d-flex p-2 justify-content-center flex-wrap ">

                    <div class="m-2 flex-shrink-1 align-self-center">

                        <a href="{{ route('dishes.show',['dish'=>$dish->id])}}"  class="btn btn-success">dettagli</a>

                    </div>

                    <div class="m-2 align-self-center">

                        <a href="{{ route('dishes.edit',['dish'=>$dish->id])}}"  class="btn btn-warning">Modifica</a>

                    </div>

                    <div class="m-2 align-self-center justify-self-center">

                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Cancella
                        </button>

                        <div class="modal fade" id="deleteModal" tabindex="-1">

                            <div class="modal-dialog">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <h5 class="modal-title"> Sei sicuro? </h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                    </div>

                                    <div class="modal-body">

                                        <div class="">

                                            <div class="">

                                                Sei sicuro di voler cancellare il piatto? 

                                            </div>

                                            <div class=" text-danger">

                                                (questa operazione sarà irreversibile)

                                            </div>

                                        </div>

                                    </div>

                                    <form  action="{{route('dishes.destroy',['dish'=>$dish->id])}}" method="POST">

                                    @csrf

                                    @method('Delete')

                                        <div class="modal-footer justify-content-center ">

                                            <button type='submit' class="col-6 btn btn-danger">

                                                Cancella

                                            </button>

                                            <button type="button" class="col-6 btn btn-success" data-bs-dismiss="modal">

                                                Annulla

                                            </button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @empty
            
        @endforelse

    </div>

</div>

@endsection