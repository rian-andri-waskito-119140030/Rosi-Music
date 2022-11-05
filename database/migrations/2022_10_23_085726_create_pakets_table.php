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
        Schema::create('paket', function (Blueprint $table) {
            $table->string('id_paket')->primary();
            $table->string('id_jenis_paket');
            $table->string('nama_paket');
            $table->string('gambar');
            $table->integer('harga_sewa');
            $table->string('deskripsi_singkat');
            $table->text('deskripsi_panjang');
            $table->timestamps();

            $table->foreign('id_jenis_paket')->references('id_jenis_paket')->on('jenis_paket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket');
    }
};