<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->bigInteger('nik');
            $table->string('nama');
            $table->foreignId('tempat_lahir')->references('id')->on('kota_kabupaten');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->enum('agama',['islam','kristen','katholik','hindu','budha','konghucu']);
            $table->foreignId('bagian_kerja')->references('id')->on('bagian_kerja');
            $table->enum('gol_dar',['a','b','o','ab']);
            $table->text('alamat');
            $table->string('no_hp');
            $table->date('mulai');
            $table->date('akhir');
            $table->enum('sidik_jari',['belum','sudah']);
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
        Schema::dropIfExists('karyawans');
    }
}
