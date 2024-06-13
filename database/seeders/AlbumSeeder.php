<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;
use Faker\Generator as Faker;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    
    public function run(Faker $faker): void
    {
        $categories = ['Nature', 'Wildlife', 'Portraßits', 'Travel', 'Events', 'Sports'];

        for ($i=0; $i < 10; $i++) { 
            $album = new Album();
            $album->title = $faker->words(4, true);
            $album->description = $faker->paragraphs(5, true);
            $album->upload_image = $faker->imageUrl(640, 400, 'Albums', true, $album->name, true, 'jpg');
            $album->category = $faker->randomElement($categories);
            $album->featured = $faker->boolean(true);
            $album->save();
        }
    }
}
