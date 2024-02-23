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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->unsignedBigInteger('id_customer')->nullable();
            $table->unsignedBigInteger('id_toko')->nullable();
            $table->text('deskripsi_paket');
            $table->date('tanggal_keberangkatan');
            $table->integer('jumlah_rombongan');
            $table->integer('total_harga');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_customer')->references('id_customer')->on('customer');
            $table->foreign('id_toko')->references('id_toko')->on('toko');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
