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
            $table->unsignedBigInteger('ceklist_id');
            $table->foreign('ceklist_id')
                ->references('id_ceklist')
                ->on('ceklist')
                ->onDelete('cascade');

            $table->unsignedBigInteger('formulir_pengajuan_id');
            $table->foreign('formulir_pengajuan_id')->references('id_formulir_pengajuan')->on('formulir_pengajuan')->onDelete('cascade');

            $table->unsignedBigInteger('ktp_id');
            $table->foreign('ktp_id')->references('id_ktp')->on('berkas_ktp')->onDelete('cascade');

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
