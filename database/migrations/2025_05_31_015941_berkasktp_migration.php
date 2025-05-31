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
            $table->id('id_ktp_suami');
            $table->string('ktp');
            $table->timestamps();
        });
        Schema::create('berkas_ktp_istri', function (Blueprint $table) {
            $table->id('id_ktp_istri');
            $table->string('ktp');
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
