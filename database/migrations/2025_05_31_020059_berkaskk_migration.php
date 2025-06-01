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
        Schema::create('berkas_kk', function (Blueprint $table) {
            $table->id('id_kk');
            $table->string('kk');
            
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
        Schema::dropIfExists('berkas_kk');
    }
};
