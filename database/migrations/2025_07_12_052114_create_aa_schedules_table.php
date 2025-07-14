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
        Schema::create('aa_schedules', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('studio_id');
    $table->date('date');
    $table->string('start_time');
    $table->string('end_time');
    $table->boolean('is_booked')->default(false);
    $table->timestamps();

    // Foreign Key
    $table->foreign('studio_id')->references('id')->on('aa_studios')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aa_schedules');
    }
};
