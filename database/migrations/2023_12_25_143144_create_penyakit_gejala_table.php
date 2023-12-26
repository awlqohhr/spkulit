<?php

// database/migrations/YYYY_MM_DD_create_penyakit_gejala_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyakitGejalaTable extends Migration
{
    public function up()
    {
        Schema::create('penyakit_gejala', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Kode_Penyakit');
            $table->unsignedBigInteger('Kode_Gejala');
            $table->timestamps();
        });

        Schema::table('penyakit_gejala', function (Blueprint $table) {
            $table->foreign('Kode_Penyakit')->references('id')->on('penyakits')->onDelete('cascade');
            $table->foreign('Kode_Gejala')->references('id')->on('gejalas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('penyakit_gejala');
    }
}