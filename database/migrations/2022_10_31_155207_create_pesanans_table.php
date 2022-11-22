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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->string('id_pesanan')->primary();
            $table->string('id_paket');
            $table->date('tanggal_booking');
            $table->date('tanggal_selesai');
            $table->string('no_hp');
            $table->string('alamat');
            $table->timestamps();

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