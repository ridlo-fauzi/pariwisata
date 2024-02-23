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
        Schema::create('pemandu', function (Blueprint $table) {
            $table->id('id_pemandu');
            $table->string('nama_pemandu');
            $table->string('telp');
            $table->date('tanggal_keberangkatan')->nullable();
            $table->integer('harga_pemandu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemandu');
    }
};
