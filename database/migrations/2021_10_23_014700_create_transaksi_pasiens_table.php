<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pasien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien')->references('id')->on('pasien');
            $table->foreignId('rekam_medik')->references('id')->on('rekam_medik');
            $table->date('tanggal_periksa');
            $table->string('tebus_obat');
            $table->integer('biaya_obat');
            $table->integer('biaya_tindakan');
            $table->integer('biaya_kartu');
            $table->integer('biaya_total');
            $table->integer('jumlah_bayar');
            $table->integer('jumlah_kembalian');
            $table->string('status_bayar');
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
        Schema::dropIfExists('transaksi_pasiens');
    }
}
