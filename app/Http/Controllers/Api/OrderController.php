<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function checked(Request  $request) {
        $orders = $request->validate([

            'cart_total_price' => 'required|numeric|min:1.00|regex:/^\d{0,5}([,.]\d{0,2})?$/',
            'cart_products' => 'required|array',
            'cart_products.*' => 'required',
            'customer_name' => 'required|string|max:64',
            'customer_last_name' => 'required|string|max:64',
            'customer_address' => 'required|string|max:255',
            'customer_phone_number' => 'required|string|max:12',
            'customer_email' => 'required|string|email|max:319',

        ], [
            'customer_name.required' => 'Il campo Nome è obbligatorio.',
            'customer_name.max' => 'Il campo Nome non può superare i 255 caratteri.',
            'customer_last_name.required' => 'Il campo Nome del ristorante è obbligatorio.',
            'customer_last_name.max' => 'Il campo Nome del ristorante non può superare i 255 caratteri.',
            'customer_address.required' => 'Il campo Indirizzo è obbligatorio.',
            'customer_address.max' => 'Il campo Indirizzo non può superare i 255 caratteri.',
            'customer_phone_number.required' => 'il numero di telefono è obbligatorio',
            'customer_phone_number.max' => 'il numero di telefono deve essere di massimo 12 cifre',
            'customer_email.required' => 'Il campo Email è obbligatorio.',
            'customer_email.email' => 'Il campo Email deve essere un indirizzo email valido.',
            'customer_email.max' => 'Il campo Email non può superare i 319 caratteri.',

        ]);


        return response()->json([
            'orders' => 'ok'
        ]);
    }

    public function store(Request  $request) {
        $orders= $request->validate([

            'cart_total_price' => 'required|numeric|min:1.00|regex:/^\d{0,5}([,.]\d{0,2})?$/',
            'cart_products' => 'required|array',
            'cart_products.*' => 'required',
            'customer_name' => 'required|string|max:64',
            'customer_last_name' => 'required|string|max:64',
            'customer_address' => 'required|string|max:255',
            'customer_phone_number' => 'required|string|max:12',
            'customer_email' => 'required|string|email|max:319',
            'restaurant_id'=>'exists:restaurants,id'

        ], [
            'customer_name.required' => 'Il campo Nome è obbligatorio.',
            'customer_name.max' => 'Il campo Nome non può superare i 255 caratteri.',
            'customer_last_name.required' => 'Il campo Nome del ristorante è obbligatorio.',
            'customer_last_name.max' => 'Il campo Nome del ristorante non può superare i 255 caratteri.',
            'customer_address.required' => 'Il campo Indirizzo è obbligatorio.',
            'customer_address.max' => 'Il campo Indirizzo non può superare i 255 caratteri.',
            'customer_phone_number.required' => 'il numero di telefono è obbligatorio',
            'customer_phone_number.max' => 'il numero di telefono deve essere di massimo 12 cifre',
            'customer_email.required' => 'Il campo Email è obbligatorio.',
            'customer_email.email' => 'Il campo Email deve essere un indirizzo email valido.',
            'customer_email.max' => 'Il campo Email non può superare i 319 caratteri.',

        ]);
        
            $date=Carbon::date();
            $time=Carbon::time();

        Order::create([
            'name'=>$orders['name'],
            'last_name'=>$orders['last_name'],
            'address'=>$orders['address'],
            'phone_number'=>$orders['phone_number'],
            'email'=>$orders['email'],
            'date'=>$date,
            'time'=>$time,
            'restauran_id'=>$orders['restaurant_id']
        ]);
    }
}
