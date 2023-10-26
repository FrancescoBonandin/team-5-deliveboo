<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;

// Helpers
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function returnView() {

        
        return view('admin.dishes.restaurant-dishes');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {

        $data=$request->validated();


        $dishImage = null;
        if (isset($data['image'])) {
            $dishImage = Storage::put('uploads/images', $data['image']);
        }


        Dish::create([
            'name'=>$data['name'],
            'ingredients'=>$data['ingredients'],
            'description'=>$data['description'],
            'price'=>$data['price'],
            'available'=>$data['available'],
            'image'=>$dishImage,
            'restaurant_id'=>$request->user()->restaurant->id,
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        if($dish->restaurant->user_id != Auth::id())
        {
            return abort(403,'Unauthorized');
        }

        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        if($dish->restaurant->user_id != Auth::id())
        {
            return abort(403,'Unauthorized');
        }

        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        if($dish->restaurant->user_id != Auth::id())
        {
            return abort(403,'Unauthorized');;
        }

        $data=$request->validated();

        $dishImage = $dish->image;
        if (isset($data['image'])) {
            if ($dish->image) {
                Storage::delete($dish->image);
            }

            $dishImage = Storage::put('uploads/images', $data['image']);
        }
        else if (isset($data['remove_image'])) {
            if ($dish->image) {
                Storage::delete($dish->image);
            }

            $dishImage = null;
        }

        $dish->update([
            'name'=>$data['name'],
            'ingredients'=>$data['ingredients'],
            'description'=>$data['description'],
            'price'=>$data['price'],
            'available'=>$data['available'],
            'image'=>$dishImage,
            'restaurant_id'=>$request->user()->restaurant->id,
        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {

        if($dish->restaurant->user_id != Auth::id())
        {
            return abort(403,'Unauthorized');;
        }
        
        if ($dish->image) {
            Storage::delete($dish->image);
        }
    
        $dish->delete();

        return redirect()->route('dishes.view');
    }
}
