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
        Schema::create('bukti_pembayaran', function (Blueprint $table) {
            $table->string('id_bukti_pembayaran')->primary();
            $table->string('id_transaksi');
            $table->string('bukti');
            $table->integer('nominal');
            $table->string('status_pembayaran');
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukti_pembayarans');
    }
};