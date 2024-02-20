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
        Schema::create('booking', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('guest_id');
            $table->foreign('room_id')->references('id')->on('room');
            $table->foreign('guest_id')->references('id')->on('guest');
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
        Schema::table('booking', function (Blueprint $table){
            $table->dropForeign('booking_room_id_foreign');
            $table->dropForeign('booking_guest_id_foreign');
        });
        Schema::dropIfExists('booking');
    }
};
