<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Support\Facades\Schema;

use App\Models\Restaurant;

use App\Models\User;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

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

        storage::deleteDirectory('uploads/restaurant-images/');
        storage::makeDirectory('uploads/restaurant-images/');

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

                            'https://www.bar.it/wp-content/uploads/2015/04/pub-bar.it_.jpg',

                            'https://www.eazycityblog.com/wp-content/uploads/2019/02/ireland-2345992_1920-1170x780.jpg',

                            'https://www.maiorestaurant.com/roma/wp-content/uploads/2023/07/MAIO-ROMA-019_WEB.jpg',

                            'https://media.disneylandparis.com/d4th/it-it/images/n017807_2050jan01_blue-lagoon-restaurant_16-9_tcm764-158858.jpg?w=1960',

                            'https://media.cntraveler.com/photos/5aba59a1f75ed97616cf1816/16:9/w_1920%2Cc_limit/Osteria-Chiana_Susan-Wright_2018__DSC1732.jpg',

                            'https://media-cdn.tripadvisor.com/media/photo-s/23/9a/1f/2f/new-seafront-location.jpg',

                            'https://www.gordonramsayrestaurants.com/assets/Uploads/_resampled/CroppedFocusedImage74046061-63-vb512415-maze-Grill-Park-Walk.jpg',

                            'https://www.hazyviewcabanas.co.za/assets/img/facilities/restaurant/featured-image.webp',

                            'https://lepetitrestaurantjaponais.com/wp-content/uploads/2023/01/image1-2-1.jpeg',

                            'https://gdkfiles.visitdenmark.com/files/471/287899_Restaurant-domne---Foto-Restaurant-domne---1024x576---10.jpg?width=987',

                            'https://www.hiddencitysecrets.com.au/wp-content/uploads/2022/10/Bobbie-Peels-Restaurants-North-Melbourne-Restaurant-Top-Birthday-Dinner-Best-After-Work-Drinks-Good-Date-Night-Cocktail-Pub-Special-Occasion-2.jpg',

        ];

        for ($i=0; $i < 30; $i++) { 

            $randomUser = User::all();

            $random_img = $restaurant_img[rand(0, count($restaurant_img))];

            if(isset($random_img)){

                $imagePath = $random_img;
    
                $imgContent = file_get_contents($imagePath);              
                $newImagePath = storage_path('app/public/uploads/restaurant-images');             
                $newImageName = rand(1000, 9999).'-'.rand(1000, 9999).'-'.rand(1000, 9999).'.png';             
                $fullNewImagePath = $newImagePath.'/'.$newImageName;              
                file_put_contents($fullNewImagePath, $imgContent); 
                
                $imagePath='uploads/restaurant-images/'.$newImageName;
            }
            
            Restaurant::create([

                'restaurant_name' => fake()->company(),

                'user_id' => $randomUser[$i]->id,
                
                'address' =>  fake()->address(),

                'image' => $imagePath,
                
                'p_iva' => fake()->isbn10(),
                
            ]);
            
        }

    }

}
