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
        Schema::create('doctor_availabilities', function (Blueprint $table) {
            $table->id();
            // Doctor (FK to users)
            $table->unsignedBigInteger('doctor_id');

            // Schedule
            $table->tinyInteger('day_of_week'); // 0=Sun ... 6=Sat
            $table->time('start_time');
            $table->time('end_time');
            $table->tinyInteger('slot_minutes')->default(60); // Duration of each appointment slot in minutes


            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_availabilities');
    }
};