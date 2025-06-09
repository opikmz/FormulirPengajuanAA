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
            $table->string('formulir_pengajuan');
            $table->string('pengelola');
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade');

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
