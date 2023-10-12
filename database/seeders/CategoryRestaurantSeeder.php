<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Restaurant;

use App\Models\Category;

use Illuminate\Database\Seeder;

class CategoryRestaurantSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $restaurants = Restaurant::all();

        $categories = Category::all();

        // Loop through projects and attach technologies to them

        foreach ($restaurants as $restaurant) {

            // Attach technologies to projects (you can use attach, sync, or other methods)
            $restaurant->categories()->sync($categories->random(rand(0,count($categories)))->pluck('id')->toArray());

        }
       
    }

}



