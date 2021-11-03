<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateRekamMediksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medik', function (Blueprint $table) {
            $table->id();
            $table->string('no_rekam_medik')->nullable();
            $table->foreignId('pasien')->references('id')->on('pasien');
            $table->date('tanggal_periksa');
            $table->foreignId('dokter')->references('id')->on('dokter');
            $table->text('keluhan');
            $table->text('hasil_diaknosa');
            $table->text('catatan');
            $table->string('keterangan');
            $table->foreignId('status_pasien')->references('id')->on('status_pasien'); //status dimulai dari 1 (dibuat oleh admin)
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
        Schema::dropIfExists('rekam_mediks');
    }
}
