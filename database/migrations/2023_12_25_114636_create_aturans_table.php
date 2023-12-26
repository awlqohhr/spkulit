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
            $table->unsignedBigInteger('Kode_Gejala');
            $table->unsignedBigInteger('Kode_Penyakit');
            $table->timestamps();
        });

        Schema::table('aturans', function (Blueprint $table) {
            $table->foreign('Kode_Gejala')->references('id')->on('gejalas')->onDelete('cascade');
            $table->foreign('Kode_Penyakit')->references('id')->on('penyakits')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('aturans');
    }
}