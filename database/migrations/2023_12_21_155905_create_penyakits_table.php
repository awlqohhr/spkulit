<?php

// database/migrations/xxxx_xx_xx_create_penyakits_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyakitsTable extends Migration
{
    public function up()
    {
        Schema::create('penyakits', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penyakit');
            $table->string('gambar')->nullable();
            $table->string('nama_penyakit');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penyakits');
    }
}
