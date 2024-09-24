<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookStoresTable extends Migration
{
    public function up()
    {
        Schema::create('book_stores', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->string('bookstore_name', 30);
            $table->string('bookstore_introduction', 255);
            $table->string('url')->nullable();
            $table->string('header_img')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_stores');
    }
}