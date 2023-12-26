<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGejalasTable extends Migration
{
    public function up()
    {
        Schema::create('gejalas', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_Gejala')->unique();
            $table->string('Nama_Gejala');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gejalas');
    }
}