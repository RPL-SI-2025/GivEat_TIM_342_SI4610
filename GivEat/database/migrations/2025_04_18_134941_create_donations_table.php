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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->foreignId('category_id')->constrained()->onDelete('restrict');
            $table->dateTime('pickup_time');
            $table->string('image')->nullable();
            $table->integer('portion')->default(1);
            $table -> string ('location');
            $table->enum('status', ['available', 'claimed', 'completed'])->default('available');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
