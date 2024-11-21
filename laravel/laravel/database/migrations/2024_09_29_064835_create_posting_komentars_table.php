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
        Schema::create('posting_komentars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_POSTING');
            $table->string('PENULIS');
            $table->longText('TEXT')->nullable();
            $table->string('GAMBAR')->nullable();
            $table->integer('LIKE')->default(0);
            $table->integer('DISLIKE')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posting_komentars');
    }
};