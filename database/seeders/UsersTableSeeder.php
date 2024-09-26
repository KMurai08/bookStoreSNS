<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // テーブルをクリア
        // User::truncate();

        // ダミーユーザーを作成
        User::factory()
            ->count(3)
            ->create();
    }
}