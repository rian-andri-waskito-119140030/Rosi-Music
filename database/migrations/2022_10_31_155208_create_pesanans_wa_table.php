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
        Schema::create('pesanan_wa', function (Blueprint $table) {
            $table->string('id_pesanan')->primary();
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->string('id_paket');
            $table->date('tanggal_booking');
            $table->date('tanggal_selesai');
            $table->string('no_hp');
            $table->string('alamat');
            $table->text('catatan');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id')->on('users');
            $table->foreign('id_paket')->references('id_paket')->on('paket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
};