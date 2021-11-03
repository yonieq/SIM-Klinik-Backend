<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntriansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_periksa');
            $table->foreignId('pasien')->references('id')->on('pasien');
            $table->foreignId('dokter')->references('id')->on('dokter');
            $table->foreignId('poliklinik')->references('id')->on('poliklinik');
            $table->foreignId('status')->references('id')->on('status_pasien')->onDelete('cascade');;
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
        Schema::dropIfExists('antrians');
    }
}
