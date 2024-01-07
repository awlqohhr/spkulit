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
        Schema::create('hasil_diagnosas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('umur');
            $table->string('jenis_kelamin');
            $table->string('no_telp')->nullable();
            $table->string('alamat');
            $table->string('Kode_Penyakit');

            $table->timestamps();

            $table->foreign('Kode_Penyakit')->references('Kode_Penyakit')->on('penyakits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_diagnosas');
    }
};
