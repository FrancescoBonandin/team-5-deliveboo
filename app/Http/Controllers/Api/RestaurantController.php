<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index() {

        $restaurants = Restaurant::with('categories')->get();

        return response()->json([

            'restaurants'=>$restaurants

        ]);
    }

    public function show( string $id){

        $restaurant= Restaurant::with('dishes')->find($id);

        return response()->json([

        
            'restaurant' => $restaurant,

        ]);
            
    }
}
