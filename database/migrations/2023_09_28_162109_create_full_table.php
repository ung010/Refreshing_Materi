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
        Schema::create('full', function (Blueprint $table) {
            $table->bigIncrements('id_full');
            $table->foreignId('id_buku')->references('id')->on('buku')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_kategori')->references('id')->on('bukukategori')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('join');
    }
};
