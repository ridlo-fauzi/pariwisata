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
        Schema::create('pemesanan_pemandu', function (Blueprint $table) {
            $table->id('id_pemesanan_pemandu');
            $table->unsignedBigInteger('id_pemesanan');
            $table->unsignedBigInteger('id_pemandu');
            $table->timestamps();

            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanan');
            $table->foreign('id_pemandu')->references('id_pemandu')->on('pemandu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_pemandu');
    }
};
