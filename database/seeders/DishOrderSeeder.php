<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dish;

use App\Models\Order;

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Seeder;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        
    public function run(): void
    {   

        $orders = Order::all();

        $dishes = Dish::all();

        foreach ($orders as $order) {

            $order->dishes()->sync($dishes->random(rand(0,count($dishes)))->pluck('id')->toArray());

            // $order->dishes()->attach($dishes,

            //     [

            //         'quantity' => rand(1,10)

            //     ]
            
            // );
           
        }

    }   

}

