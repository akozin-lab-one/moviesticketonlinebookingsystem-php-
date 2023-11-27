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
        Schema::create('cinema_room_seats', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id');
            $table->integer('seat_no');
            $table->string('row_name');
            $table->string('seat_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cinema_room_seats');
    }
};
