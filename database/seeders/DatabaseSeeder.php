<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
{
    $this->call([
        GenreSeeder::class,
        TagSeeder::class,
        UsersTableSeeder::class,
        NovelsTableSeeder::class,  
        BookStoresTableSeeder::class,
        ReviewsDataSeeder::class,
        UserFavoriteReviewSeeder::class,
    ]);
}
}
