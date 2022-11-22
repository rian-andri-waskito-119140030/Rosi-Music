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
        Schema::create('barang_dipaket', function (Blueprint $table) {
            $table->id();
            $table->string('id_paket');
            $table->string('id_jenis_barang');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_paket')->references('id_paket')->on('paket');
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
        Schema::dropIfExists('barang_dipaket');
    }
};