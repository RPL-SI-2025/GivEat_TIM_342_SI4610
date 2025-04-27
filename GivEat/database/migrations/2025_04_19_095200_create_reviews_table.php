<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('nama_restoran');
            $table->string('nama_hidangan');
            $table->tinyInteger('penilaian'); // rating 1-5
            $table->string('foto_makanan')->nullable(); // opsional
            $table->text('deskripsi_ulasan');
            $table->string('tag')->nullable(); // bisa pakai koma (,)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}