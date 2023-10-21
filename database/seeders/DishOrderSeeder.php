<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dish;

use App\Models\Order;

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Seeder;

use function PHPUnit\Framework\isEmpty;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        
    public function run(): void
    {   

        $orders = Order::all();

       

        foreach($orders as $order){
            // Per ogni ordine cancella i piatti assocciati
            $order->dishes()->detach();
        }

        foreach ($orders as  $order) {

            // cicla tutti gli ordini
            $total_price=0;

            $dishes = Dish::where('restaurant_id','=',$order->restaurant_id)->get();

            foreach ($dishes as $dish) {

                // cicla tutti i piatti

                

                if(fake()->boolean(80)){

                    // se è vero(60% prob), aggiungi all'ordine il singolo piatto CON la singola quantità associata
                    $multiplier=rand(1, 10);
                    $order->dishes()->syncWithPivotValues($dish->id, ['quantity' => $multiplier ]);


                    $total_price+=$dish->price*$multiplier;


                }
                
            }
            
            $order->update(['total_price'=>$total_price]);
            
            if($order->total_price==0){
                $order->delete();
            }
         
        }

    }   

}

