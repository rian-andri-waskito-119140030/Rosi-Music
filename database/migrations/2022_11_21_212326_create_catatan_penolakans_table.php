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
        Schema::create('catatan_penolakan', function (Blueprint $table) {
            $table->id();
            $table->string('id_pesanan');
            $table->string('catatan_penolakan');
            $table->timestamps();

            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catatan_penolakan');
    }
};