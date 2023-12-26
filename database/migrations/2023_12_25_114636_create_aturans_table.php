<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAturansTable extends Migration
{
    public function up()
    {
        Schema::create('aturans', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_Gejala'); // Menggunakan tipe data yang sesuai
            $table->string('Kode_Penyakit'); // Menggunakan tipe data yang sesuai
            $table->timestamps();
    
            $table->foreign('Kode_Gejala')->references('Kode_Gejala')->on('gejalas')->onDelete('cascade');
            $table->foreign('Kode_Penyakit')->references('Kode_Penyakit')->on('penyakits')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('aturans');
    }
}