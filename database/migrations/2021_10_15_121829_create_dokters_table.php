<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->bigInteger('nik');
            $table->string('nama');
            $table->foreignId('tempat_lahir')->references('id')->on('kota_kabupaten');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->enum('agama',['islam','kristen','katholik','hindu','budha','konghucu']);
            $table->enum('gol_dar',['a','b','o','ab']);
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('no_sip');
            $table->string('no_str');
            $table->foreignId('poliklinik')->references('id')->on('poliklinik');
            $table->date('masa_sip');
            $table->date('masa_str');
            $table->string('lembaga_regist_sip');
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
        Schema::dropIfExists('dokters');
    }
}
