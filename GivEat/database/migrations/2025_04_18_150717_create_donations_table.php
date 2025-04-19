<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id('id_donation');
            $table->unsignedBigInteger('donor_id');
            $table->string('food_name');
            $table->text('description');
            $table->integer('quantity');
            $table->date('expiration_date');
            $table->integer('location_id');
            $table->string('image');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('donor_id')->references('user_id')->on('donors');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};