<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyakitsTable extends Migration
{
    public function up()
    {
        Schema::create('penyakits', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_Penyakit')->unique();
            $table->string('Gambar_Penyakit')->nullable();
            $table->string('Nama_Penyakit');
            $table->text('Deskripsi_Penyakit');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penyakits');
    }
}