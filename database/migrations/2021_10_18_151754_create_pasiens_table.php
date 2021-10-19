<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->foreignId('tempat_lahir')->references('id')->on('kota_kabupaten');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->string('alamat');
            $table->enum('agama',['islam','kristen','katholik','hindu','budha','konghucu']);
            $table->string('no_telepon')->unique();
            $table->integer('usia');
            $table->string('gol_darah');
            $table->foreignId('asuransi')->references('id')->on('jenis_asuransis');
            $table->string('no_asuransi')->unique();
            $table->string('pekerjaan');
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
        Schema::dropIfExists('pasiens');
    }
}
