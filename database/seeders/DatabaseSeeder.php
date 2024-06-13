<?php

namespace Database\Seeders;

use Database\Seeders\AlbumSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
        AlbumSeeder::class
       ]);
    }
}
