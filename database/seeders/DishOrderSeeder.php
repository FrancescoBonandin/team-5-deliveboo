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

        foreach($orders as $order){
            $order->dishes()->detach();
        }

        foreach ($orders as $order) {

            
            foreach ($dishes as $dish) {

                if(fake()->boolean(60)){

                    $order->dishes()->syncWithPivotValues($dish->id, ['quantity' => rand(1, 10)],false);

                }

            }

            // $order->dishes()->syncWithPivotValues($dishes->random(rand(1,count($dishes)))->pluck('id')->toArray(),['quantity' => rand(1,10)]);

            // $order->dishes()->syncWithPivotValues($dishes,['quantity' => rand(1,10)]);
           
        }

    }   

}

