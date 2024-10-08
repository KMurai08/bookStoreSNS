<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use Carbon\Carbon;

class NovelsTableSeeder extends Seeder
{
    public function run()
    {
        // $csv = Reader::createFromPath(storage_path('app/novels.csv'), 'r');
        // $csv->setHeaderOffset(0);

        $csvPath = database_path('seeders/novels.csv');
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);


        foreach ($csv as $record) {
            $now = Carbon::now();
            DB::table('novels')->insert([
                'id' => $record['id'],
                'user_id' => $record['user_id'],
                'novel_url' => $record['novel_url'],
                'novel_title' => $record['novel_title'],
                'novel_introduction' => $record['novel_introduction'],
                'novel_text' => $record['novel_text'],
                'genre_id' => $record['genre_id'],
                'status' => $record['status'],
                'story_length' => $record['story_length'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}