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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('no_kartu')->nullable();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->foreignId('tempat_lahir')->references('id')->on('kota_kabupaten');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['L','P']);
            $table->string('alamat');
            $table->enum('agama',['Islam','Kristen','Katholik','Hindu','Budha','Konghucu']);
            $table->string('no_telepon')->nullable();
            $table->integer('usia');
            $table->enum('gol_darah',['A','B','AB','O','Belum Diketahui']);
            $table->string('pekerjaan')->nullable();
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
