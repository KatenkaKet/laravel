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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('corpus_id');
            $table->foreign('corpus_id')->references('id')->on('corpuses');
            $table->unsignedInteger('room_number');
            $table->unsignedInteger('bed_number');
            $table->unsignedInteger('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('room', function (Blueprint $table){
            $table->dropForeign('rooms_corpus_id_foreign');
        });
        Schema::dropIfExists('rooms');

    }
};
