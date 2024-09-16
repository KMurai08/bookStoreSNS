<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = [
            ['genre_name' => '人文・思想'],
            ['genre_name' => '哲学・評論'],
            ['genre_name' => 'SF'],
            ['genre_name' => 'ホラー'],
            ['genre_name' => 'ファンタジー'],
        ];

        foreach ($genres as $genre) {
            DB::table('genres')->insert($genre);
        }
    }
}