<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRujukanPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rujukan_pasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rekam_medik')->references('id')->on('rekam_medik');
            $table->string('rs');
            $table->string('kondisi');
            $table->string('dokter');
            $table->foreignId('status_pasien')->references('id')->on('status_pasien');
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
        Schema::dropIfExists('rujukan_pasiens');
    }
}
