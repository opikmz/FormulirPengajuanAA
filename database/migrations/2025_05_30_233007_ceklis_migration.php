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
        Schema::create('ceklis', function (Blueprint $table) {
            $table->id('id_ceklis');
            $table->boolean('ceklis_ktp_suami');
            $table->boolean('ceklis_ktp_istri');
            $table->boolean('ceklis_kk');
            $table->boolean('ceklis_jaminan');
            $table->boolean('ceklis_rumah');
            
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
        Schema::dropIfExists('ceklis');
    }
};
