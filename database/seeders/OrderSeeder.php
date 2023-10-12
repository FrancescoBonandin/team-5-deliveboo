<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {

            Order::truncate();

        });

        for ($i=0; $i < 10; $i++) { 

            Order::create([

                'name' =>  fake()->firstName(),

                'last_name' =>  fake()->lastName(),
                
                'address' =>  fake()->address(),
                
                'phone_number' =>  fake()->e164PhoneNumber(),

                'email' =>  fake()->email(),

                'total_price' =>  fake()->randomFloat(2, 1, 999 ),
                
            ]);
            
        }

    }

}
