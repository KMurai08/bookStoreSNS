<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsDataSeeder extends Seeder
{
    public function run()
    {
        $csvFile = database_path('seeders/reviews.csv');
        $csvData = array_map('str_getcsv', file($csvFile));
        
        $header = array_shift($csvData);
        
        foreach ($csvData as $row) {
            $data = array_combine($header, $row);
            DB::table('reviews')->insert($data);
        }
    }
}