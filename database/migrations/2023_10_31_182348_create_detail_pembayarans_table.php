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
        Schema::create('detail_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_pembayaran_id');
            $table->unsignedBigInteger('pembayaran_id');
            $table->unsignedBigInteger('siswa_id');
            $table->string('bukti_pembayaran');
            $table->integer('jumlah_transfer');
            $table->date('tanggal_transfer');
            $table->string('nama_pemegang_rekening');
            $table->text('keterangan')->nullable();
            $table->enum('status_verifikasi', ['diterima', 'menunggu'])->default('menunggu');
            $table->timestamps();
            $table->foreign('jenis_pembayaran_id')->references('id')->on('jenis_pembayarans');
            $table->foreign('pembayaran_id')->references('id')->on('pembayarans');
            $table->foreign('siswa_id')->references('id')->on('siswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembayarans');
    }
};
