<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;

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
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request;
        Dish::create([
            'name'=>$data['name'],
            'ingredients'=>$data['ingredients'],
            'description'=>$data['description'],
            'price'=>$data['price'],
            'available'=>$data['available'],
            'image'=>$data['image'],
            'restaurant_id'=>$data['restaurant_id'],
        ]);
        return redirect()->route('dishes.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return view('admin.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        return view('admin.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $data=$request;
        Dish::create([
            'name'=>$data['name'],
            'ingredients'=>$data['ingredients'],
            'description'=>$data['description'],
            'price'=>$data['price'],
            'available'=>$data['available'],
            'image'=>$data['image'],
            'restaurant_id'=>$data['restaurant_id'],
        ]);
        return redirect()->route('dishes.show', compact('dish'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
    }
}
