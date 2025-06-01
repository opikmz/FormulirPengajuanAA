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
        Schema::create('berkas_ktp_suami', function (Blueprint $table) {
            $table->id('id_berkas_ktp_suami');
            $table->string('berkas_ktp_suami');

            $table->unsignedBigInteger('pengajuan_id');
            $table->foreign('pengajuan_id')
                ->references('id_pengajuan')
                ->on('pengajuan')
                ->onDelete('cascade');

            $table->timestamps();
        });
        Schema::create('berkas_ktp_istri', function (Blueprint $table) {
            $table->id('id_ktp_istri');
            $table->string('ktp');

            $table->unsignedBigInteger('pengajuan_id');
            $table->foreign('pengajuan_id')
                ->references('id_pengajuan')
                ->on('pengajuan')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_ktp_suami');
        Schema::dropIfExists('berkas_ktp_istri');
    }
};
