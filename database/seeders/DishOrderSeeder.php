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
            // Per ogni ordine cancella i piatti assocciati
            $order->dishes()->detach();
        }

        foreach ($orders as  $order) {

            // cicla tutti gli ordini
            $total_price=0;

            foreach ($dishes as $i=>$dish) {

                // cicla tutti i piatti

                

                if(fake()->boolean(60)){

                    // se è vero(60% prob), aggiungi all'ordine il singolo piatto CON la singola quantità associata
                    $multiplier=rand(1, 10);
                    $order->dishes()->syncWithPivotValues($dish->id, ['quantity' => $multiplier ],false);


                    $total_price+=$dish->price*$multiplier;


                }
                
            }
            $order->update(['total_price'=>$total_price]);
        }

    }   

}

