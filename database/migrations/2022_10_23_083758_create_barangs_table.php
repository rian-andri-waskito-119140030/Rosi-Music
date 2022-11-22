<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->string('id_barang')->primary();
            $table->string('gambar');
            $table->string('nama_barang');
            $table->string('id_jenis_barang');
            $table->string('kondisi');
            $table->timestamps();

            $table->foreign('id_jenis_barang')->references('id_jenis_barang')->on('jenis_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
};