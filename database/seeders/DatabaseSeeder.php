<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    // $this->call(UsersTableSeeder::class);
    // }
    public function run()
{
    $this->call([
        GenreSeeder::class,
        TagSeeder::class,
        UsersTableSeeder::class,
        NovelsTableSeeder::class,  // 追加
        
    ]);
}
}
