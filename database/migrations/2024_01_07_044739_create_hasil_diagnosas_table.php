<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hasil_diagnosas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diagnosa_id')->constrained();
            $table->text('hasil');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_diagnosas');
    }
};
