<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['tag_name' => '泣ける'],
            ['tag_name' => '笑える'],
            ['tag_name' => 'スッキリ'],
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert($tag);
        }
    }
}