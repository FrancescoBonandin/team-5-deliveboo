<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function returnView(){

        $data=Auth::user()->restaurant->orders()->with('dishes')->get();

        return view('admin.statistics.restaurant-statistics',compact('data'));
    }
}
