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
        Schema::create('cinema_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer("cinema_id");
            $table->integer("room_number");
            $table->string("room_name");
            $table->integer("seating_capacity");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cinema_rooms');
    }
};
