<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedikTindakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medik_tindakans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rekam_medik')->references('id')->on('rekam_medik'); 
            $table->foreignId('tindakan')->references('id')->on('tindakan'); 
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
        Schema::dropIfExists('rekam_medik_tindakans');
    }
}
