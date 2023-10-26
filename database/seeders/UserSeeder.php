<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Schema::withoutForeignKeyConstraints(function () {

            User::truncate();

        });



        for ($i=0; $i < 30; $i++) { 

            User::create([

                'name' =>  fake()->firstName(),
                
                'email' =>  fake()->companyEmail(),
                
                'password' =>  password_hash('password',PASSWORD_DEFAULT),

            ]);
            
        }

    }

}
