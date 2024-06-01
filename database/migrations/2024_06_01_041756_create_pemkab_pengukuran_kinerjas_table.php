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
        Schema::create('pemkab_pengukuran_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('sasaran_bupati_id');
            $table->foreignId('sasaran_bupati_indikator_id');
            $table->double('target')->nullable();
            $table->double('realisasi')->nullable();
            $table->enum('karakteristik', ['1', '2'])->nullable();
            $table->double('capaian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemkab_pengukuran_kinerjas');
    }
};
