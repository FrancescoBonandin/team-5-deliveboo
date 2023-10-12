<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Support\Facades\Schema;

use App\Models\Restaurant;

use App\Models\User;

use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {

            Restaurant::truncate();

        });

        $restaurant_img = [ 

                            'https://media.timeout.com/images/105898222/750/422/image.jpg',

                            'https://daddysdeals.co.za/wp-content/uploads/2023/01/The-20-Best-Restaurants-in-Bedfordview-.jpeg',

                            'https://www.joburgetc.com/wp-content/uploads/2023/03/Top-10-Restaurants-in-Bedfordview-.jpeg',

                            'https://assets.gqindia.com/photos/62a9d4653e8cdc9b632eb2ad/16:9/w_1920,h_1080,c_limit/10%20restaurants%20in%20Mumbai%20that%20offer%20the%20best%20sunset%20views.jpg',

                            'https://loveincorporated.blob.core.windows.net/contentimages/gallery/c34028e1-e7e7-4bb3-a97c-961b9723f21d-vetri-nevada.jpg',

                            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_Telg8imzePegsrdm7jTt0rVx1QZD_uQ6Og&usqp=CAU',

                            'https://media1.citybeat.com/citybeat/imager/the-25-best-restaurants-in-greater-cincinnati-right-now-according-to-yelp/u/zoom/14734515/bakerstable_hb-4234.jpg?cb=1693342577',

                            'https://www.google.com/url?sa=i&url=https%3A%2F%2Finsideguide.co.za%2Fcape-town%2Fnew-restaurants%2F&psig=AOvVaw1-4KsBPe7AN3_8pJeW3tyV&ust=1697195440329000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCIC_ytiw8IEDFQAAAAAdAAAAABAJ',

                            'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.cntraveler.com%2Fgallery%2Fbest-restaurants-in-montreal&psig=AOvVaw1-4KsBPe7AN3_8pJeW3tyV&ust=1697195440329000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCIC_ytiw8IEDFQAAAAAdAAAAABAE',

                            'https://images.squarespace-cdn.com/content/v1/5a9ebf8d3e2d09baa871c6d3/1551116676498-J4ZO4NXTGKN6HCNCSDWT/ke17ZwdGBToddI8pDm48kLkXF2pIyv_F2eUT9F60jBl7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z4YTzHvnKhyp6Da-NYroOW3ZGjoBKy3azqku80C789l0iyqMbMesKd95J-X4EagrgU9L3Sa3U8cogeb0tjXbfawd0urKshkc5MgdBeJmALQKw/_MG_0039.jpg?format=1500w',

        ];

        for ($i=0; $i < 10; $i++) { 

            $randomUser = User::inRandomOrder()->first();

            $random_img = $restaurant_img[$i];

            Restaurant::create([

                'restaurant_name' =>  fake()->company(),

                'user_id' => $randomUser->id,
                
                'address' =>  fake()->address(),

                'image' => $random_img,
                
                'p_iva' => fake()->isbn10(),
                
            ]);
            
        }

    }

}
