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
        Schema::create('swipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('swiper_user_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('swiped_user_id')->constrained('users')->onDelete('cascade'); 
            $table->enum('direction', ['match', 'pass']); 
            $table->timestamps();
    
            $table->unique(['swiper_user_id', 'swiped_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('swipes');
    }
};
