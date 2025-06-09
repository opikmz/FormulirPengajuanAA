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
        Schema::create('5c', function (Blueprint $table) {
            $table->id('id_5c');
            $table->string('character');
            $table->string('capacity');
            $table->string('capital');
            $table->string('collateral');
            $table->string('condition');

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
        Schema::dropIfExists('5c');
    }
};
