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
        Schema::create('pesanan_sistem', function (Blueprint $table) {
            $table->id();
            $table->string('id_pesanan');
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->text('catatan');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanan');
            $table->foreign('id_pelanggan')->references('id')->on('users');
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