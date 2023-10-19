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
     
    public function filter($selectedCategories) {

        $restaurants = Restaurant::all()->with('categories');
        $filteredRestaurants = $restaurants->categories()
        ->where(function($selectedCategories, $restaurants){
            foreach ($restaurants as $restaurant) {
               // foreach ($selectedCategories as $selectedCategory) {
                $restaurant->categories()
                ->wherein('id', $selectedCategories);
               // }
            }
            
        })->get();
        return response()->json(['restaurant'=>$filteredRestaurants]);
    }
}
