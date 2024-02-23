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
        Schema::create('rumah_makan', function (Blueprint $table) {
            $table->id('id_rumah_makan');
            $table->string('nama_rumah_makan');
            $table->string('lokasi');
            $table->text('deskripsi');
            $table->integer('harga_service_makan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumah_makan');
    }
};
