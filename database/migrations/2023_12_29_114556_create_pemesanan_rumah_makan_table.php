<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanan_rumah_makan', function (Blueprint $table) {
            $table->id('pemesanan_rumah_makan');
            $table->unsignedBigInteger('id_pemesanan');
            $table->unsignedBigInteger('id_rumah_makan');
            $table->integer('jumlah_makan');
            $table->timestamps();

            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanan');
            $table->foreign('id_rumah_makan')->references('id_rumah_makan')->on('rumah_makan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_rumah_makan');
    }
};
