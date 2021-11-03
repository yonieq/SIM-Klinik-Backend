<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedikObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medik_obats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rekam_medik')->references('id')->on('rekam_medik'); 
            $table->foreignId('obat')->references('id')->on('obat'); 
            $table->integer('dosis');
            $table->string('aturan_minum');
            $table->integer('jumlah');
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
        Schema::dropIfExists('rekam_medik_obats');
    }
}
