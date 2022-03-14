<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nisn', 8)->primary();
            $table->string('id_kelas', 10)->nullable();
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
            $table->string('nama', 255);
            $table->string('jenis_kelamin', 9);
            $table->date('tanggal_lahir');
            $table->string('alamat', 255);
            $table->string('no_telp', 15);
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
        Schema::dropIfExists('siswa');
    }
}
