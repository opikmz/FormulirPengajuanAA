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
        Schema::create('pesan_komite', function (Blueprint $table) {
            $table->id('id_pesan_komite');
            $table->string('nama');
            // $table->timestamps('tanggal');
            $table->text('pesan_komite');

            $table->unsignedBigInteger('komite_id');
            $table->foreign('komite_id')
                ->references('id_komite')
                ->on('komite')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan_komite');
    }
};
