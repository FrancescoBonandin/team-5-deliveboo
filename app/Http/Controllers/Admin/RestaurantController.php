<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function returnView(){

        $currentYear=Carbon::now()->year;
        
        $data = Auth::user()->restaurant->orders()->select(
            DB::raw('YEAR(date) as year'),
            DB::raw('MONTH(date) as month'),
            DB::raw('COUNT(*) as count'),
            DB::raw('SUM(total_price) as income')
        )
        ->whereYear('date',$currentYear)
        ->groupBy('year', 'month')
        ->orderBy('year','desc')
        ->orderBy('month')
        ->get();
        
        $dataArray = $data->toArray();
        $dbMonths = array_column($dataArray,'month');


            for($i=1;$i <= 12;$i++){
    
                if(!in_array($i, $dbMonths)){
                    array_push($dataArray, ['year'=>$currentYear, 'month'=>$i, 'count'=>0, 'income'=>0]);
                }
    
            }


        $months = array_column($dataArray,'month');
        array_multisort($months,SORT_ASC,$dataArray);
        return view('admin.statistics.restaurant-statistics',compact('dataArray'));
    }
}
