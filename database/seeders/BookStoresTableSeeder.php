<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookStoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookstores = [
            [
                'user_id' => 1,
                'bookstore_name' => '朝の光書店',
                'bookstore_introduction' => '朝に読みたい本を紹介します。',
                'url' => 'https://',
                'header_img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'bookstore_name' => '夕陽屋',
                'bookstore_introduction' => '夕暮れに読みたくなる本を紹介します。',
                'url' => 'https://',
                'header_img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'bookstore_name' => '夜の月書店',
                'bookstore_introduction' => '夜にぴったりの本を紹介します。',
                'url' => 'https://',
                'header_img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('book_stores')->insert($bookstores);
    }
}