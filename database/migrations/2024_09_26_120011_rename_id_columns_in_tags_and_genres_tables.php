<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->renameColumn('tag_id', 'id');
        });

        Schema::table('genres', function (Blueprint $table) {
            $table->renameColumn('genre_id', 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->renameColumn('id', 'tag_id');
        });

        Schema::table('genres', function (Blueprint $table) {
            $table->renameColumn('id', 'genre_id');
        });
    }
};