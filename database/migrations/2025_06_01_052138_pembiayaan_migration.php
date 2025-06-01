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
        Schema::create('pembiayaan', function (Blueprint $table) {
            $table->id('id_pembiayaan');
            $table->decimal('jumlah_pembiayaan');
            $table->integer('jangka_waktu');
            $table->enum('sistem_pengembalian', ['harian', 'mingguan', 'bulanan', 'tangguh']);
            $table->enum('bentuk_pembiayaan', ['murobahah', 'mudhorobah', 'ijaroh', 'musyarokah', 'qurdul_hasan']);

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
        Schema::dropIfExists('pembiayaan');
    }
};
