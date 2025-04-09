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
        Schema::create('corpuses', function (Blueprint $table) {
            $table->id();
            $table->string('corpus_name', 255);
            $table->string('image_url', 255)->default('https://storage.yandexcloud.net/surgu-pir/14754740.jpg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corpuses');
    }
};
