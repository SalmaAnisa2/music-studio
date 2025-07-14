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
        Schema::create('aa_bookings', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id');
    $table->unsignedBigInteger('studio_id');
    $table->date('booking_date');
    $table->string('start_time');
    $table->string('end_time');
    $table->string('status')->default('pending'); // pending, approved, cancelled
    $table->timestamps();

    // Foreign Key
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('studio_id')->references('id')->on('aa_studios')->onDelete('cascade');
});
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aa_bookings');
    }
};
