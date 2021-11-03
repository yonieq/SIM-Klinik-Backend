<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayananPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan_pasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien')->references('id')->on('pasien');
            $table->foreignId('layanan')->references('id')->on('jenis_layanans');
            $table->string('no_layanan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layanan_pasiens');
    }
}
