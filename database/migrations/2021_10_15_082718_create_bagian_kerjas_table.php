<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBagianKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bagian_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('kerja');
            $table->decimal('perhari',13,3)->nullable();
            $table->decimal('cuti',13,3)->nullable();
            $table->decimal('izin',13,3)->nullable();
            $table->decimal('lembur',13,3)->nullable();
            $table->foreignId('role')->nullable()->references('id')->on('roles');
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
        Schema::dropIfExists('bagian_kerjas');
    }
}
