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
        Schema::create('aturans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Kode_Gejala');
            $table->unsignedBigInteger('');
            // Tambahkan kolom lain sesuai kebutuhan
            $table->timestamps();
        });

        Schema::table('aturans', function (Blueprint $table) {
            $table->foreign('Kode_Gejala')->references('Kode_Gejala')->on('gejalas')->onDelete('cascade');
            $table->foreign('Kode_Penyakit')->references('Kode_Penyakit')->on('penyakits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aturans');
    }
};
