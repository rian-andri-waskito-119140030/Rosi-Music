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
        Schema::create('kondisi_barang', function (Blueprint $table) {
            $table->id();
            $table->string('id_jenis_barang');
            $table->integer('baik');
            $table->integer('rusak');
            $table->integer('diperbaiki');
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
        Schema::dropIfExists('status_barang');
    }
};