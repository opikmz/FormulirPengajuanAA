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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->string('nama');
            $table->string('alamat');
            $table->bigInteger('jumlah_pembiayaan');
            // Relasi
            $table->unsignedBigInteger('ceklis_id');
            $table->foreign('ceklis_id')
                ->references('id_ceklis')
                ->on('ceklis')
                ->onDelete('cascade');

            $table->unsignedBigInteger('formulir_pengajuan_id');
            $table->foreign('formulir_pengajuan_id')->references('id_formulir_pengajuan')->on('formulir_pengajuan')->onDelete('cascade');

            $table->unsignedBigInteger('ktp_id_suami');
            $table->foreign('ktp_id_suami')->references('id_ktp_suami')->on('berkas_ktp_suami')->onDelete('cascade');

            $table->unsignedBigInteger('ktp_id_istri');
            $table->foreign('ktp_id_istri')->references('id_ktp_istri')->on('berkas_ktp_istri')->onDelete('cascade');

            $table->unsignedBigInteger('kk_id');
            $table->foreign('kk_id')->references('id_kk')->on('berkas_kk')->onDelete('cascade');

            $table->unsignedBigInteger('jaminan_id');
            $table->foreign('jaminan_id')->references('id_jaminan')->on('jaminan')->onDelete('cascade');

            $table->unsignedBigInteger('rumah_id');
            $table->foreign('rumah_id')->references('id_rumah')->on('rumah')->onDelete('cascade');

            // Timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
