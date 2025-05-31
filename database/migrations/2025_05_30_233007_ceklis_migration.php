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
        Schema::create('ceklist', function (Blueprint $table) {
            $table->id('id_ceklist');
            $table->boolean('fc_ktp');
            $table->boolean('fc_kk');
            $table->boolean('fc_data_usaha');
            $table->boolean('mutasi_rekening')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ceklist');
    }
};
