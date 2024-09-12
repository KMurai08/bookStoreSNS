<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NovelsTableSeeder extends Seeder
{
    public function run()
    {
        $csvFile = database_path('seeders/csv/novels.csv');
        $csvData = array_map('str_getcsv', file($csvFile));

        $header = array_shift($csvData);

        foreach ($csvData as $row) {
            $data = array_combine($header, $row);
            DB::table('novels')->insert([
                'novel_id' => $data['novel_id'],
                'user_id' => $data['user_id'],
                'novel_url' => $data['novel_url'],
                'novel_title' => $data['novel_title'],
                'novel_introduction' => $data['novel_introduction'],
                'novel_text' => $data['novel_text'],
                'genre_id' => $data['genre_id'],
                'status' => $data['status'],
                'story_length' => $data['story_length'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}