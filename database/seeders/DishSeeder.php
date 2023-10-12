<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

use App\Models\Restaurant;

use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Schema::withoutForeignKeyConstraints(function () {

            Dish::truncate();

        });

        $dish_img = [ 
            
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrt1EInzip1NZ71yE0yKJ99ZtDqzzO-7iqtw&usqp=CAU',

            'https://media-cdn.tripadvisor.com/media/photo-s/1c/2f/33/2d/healthy-bowl-frische.jpg',

            'https://media-cdn.tripadvisor.com/media/photo-s/15/9e/05/d1/grilled-prawn.jpg',

            'https://cdn.images.ondaplatform.com/portals_articles/1110/gallery/P1030749-XL.jpg?crop=smart&mt=1674553138&width=420&height=280&format=jpeg',

            'https://baltimore.org/wp-content/uploads/2020/02/Alt-Bygone-1680x0-c-default.png',

            'https://northernvirginiamag.com/wp-content/uploads/2022/10/2941cover.jpg',

            'https://media-cdn.tripadvisor.com/media/photo-p/17/06/96/ca/mixed-peppers-olives.jpg',

            'https://www.ciboserio.it/wp-content/uploads/2019/08/salmone-sushi.jpg',

            'https://www.mashed.com/img/gallery/2-ways-to-tell-if-your-meat-is-cooked-without-cutting-it/-1484683588.jpg',

            'https://veerji.ca/wp-content/uploads/2022/02/Chicken-Tikka-Masala.jpeg',

        ];

        $dish_name = [

            'hamburger 1',

            'healthy-bowl',

            'gamberi alla griglia',

            'pasta-1',

            'special 1',

            'special 2',

            'pizza gitana',

            'sushi mix',

            'juicy meat',

            'chapati and chicken'

        ];

        for ($i=0; $i < 10; $i++) { 

            $randomRestaurant = Restaurant::inRandomOrder()->first();

            $random_img = $dish_img[$i];

            $random_name = $dish_name[$i];

            $random_number = rand(1,6);

            Dish::create([

                'restaurant_id' => $randomRestaurant->id,

                'name' =>  $random_name,
                
                'ingredients' =>  fake()->words($random_number, true),
                
                'description' =>  fake()->text(50),
                
                'price' =>  fake()->randomFloat(2, 1, 99 ),
 
                'available' => fake()->boolean(),

                'image' => $random_img
                
            ]);
            
        }

    }

}