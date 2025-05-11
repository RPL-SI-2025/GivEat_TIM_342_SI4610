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
        Schema::create('claims', function (Blueprint $table) {
            $table->id('id_claim');
            $table->unsignedBigInteger('donation_id');
            $table->unsignedBigInteger('recipient_id');
            $table->date('claim_date');
            $table->timestamps();

            $table->foreign('donation_id')->references('id_donation')->on('donations');
            $table->foreign('recipient_id')->references('user_id')->on('recipients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};