<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;

// Helpers
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $data=$request;

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
            'restaurant_id'=>$data['restaurant_id'],
        ]);
        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $data=$request;

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
            'restaurant_id'=>$data['restaurant_id'],
        ]);
        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        if ($dish->image) {
            Storage::delete($dish->image);
        }
    
        $dish->delete();

        return redirect()->route('admin.dashboard');
    }
}
