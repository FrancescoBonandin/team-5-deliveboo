<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {

            Category::truncate();

        });

        $restaurant_categories = [ 

            'italiano',

            'internazionale',

            'cinese', 

            'giapponese',

            'messicano', 

            'indiano',

            'pesce', 

            'carne',
                
            'pizza',

            'hamburger',
            
            'altro',
               
        ];

        for ($i=0; $i < 11; $i++) { 

            $random_categories = $restaurant_categories[$i];

            Category::create([

                'category_name' => $random_categories,
                
            ]);
            
        }
    }
}
