<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('email')->unique();
            $table->string('username')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->enum('kategori',['admin','kepala kasir','kasir','kepala apotek','apotek','medis','pendaftaran']);
            $table->string('alamat');
            $table->string('no_hp')->unique();
            $table->integer('gaji');
            $table->string('foto');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
