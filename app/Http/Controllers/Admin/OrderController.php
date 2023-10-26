<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// Controller
use App\Http\Controllers\Controller;


// Models
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{



    public function returnView() {


        return view('admin.orders.restaurant-orders');

    }

    public function destroy(Order $order) {

        if($order->restaurant->user_id != Auth::id())
        {
            return abort(403,'Unauthorized');
        }

        $order->delete();

        return redirect()->route('orders.restaurant-orders');

    }
}
