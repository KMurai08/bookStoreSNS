<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNovelIntroductionColumnInNovelsTable extends Migration
{
    public function up()
    {
        Schema::table('novels', function (Blueprint $table) {
            $table->text('novel_introduction')->change();
        });
    }

    public function down()
    {
        Schema::table('novels', function (Blueprint $table) {
            $table->string('novel_introduction', 255)->change();
        });
    }
}