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
     
    public function filter(Request $request) {

        $selectedCategories=$request->input('selectedCategories',[]);

        $filteredRestaurants = Restaurant::with('categories')
        ->whereHas('categories', function ($query) use ($selectedCategories) {
            foreach ($selectedCategories as $selectedCategory) {
                $query->whereIn('id', $selectedCategories);
            }
        }, '=', count($selectedCategories))
        ->get();
     
        return response()->json(['restaurant'=>$filteredRestaurants]);

        // return response()->json(['ok'=>'ok']);
    }
}
