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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('guest_id');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('guest_id')->references('id')->on('guests');
            $table->date('check_in');
            $table->date('check_out');
            $table->unsignedInteger('guest_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table){
            $table->dropForeign('reservations_room_id_foreign');
            $table->dropForeign('reservations_guest_id_foreign');
        });
        Schema::dropIfExists('reservations');
    }
};
