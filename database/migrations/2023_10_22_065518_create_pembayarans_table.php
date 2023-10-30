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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('jenis_pembayaran_id');
            $table->unsignedBigInteger('tahun_ajaran_id');
            $table->integer('total_biaya');
            $table->boolean('already_pay')->default(0);
            $table->timestamps();
            $table->foreign('siswa_id')->references('id')->on('siswas');
            $table->foreign('jenis_pembayaran_id')->references('id')->on('jenis_pembayarans');
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajarans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
