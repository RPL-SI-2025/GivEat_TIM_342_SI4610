<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodItemsTable extends Migration
{
    public function up()
    {
        Schema::create('food_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('portion');
            $table->string('preparation_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('food_items');
    }
}