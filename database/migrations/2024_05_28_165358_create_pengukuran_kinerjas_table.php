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
        Schema::create('pengukuran_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perencanaan_kinerja_strategic_target_id');
            $table->string('indikator_sasaran')->nullable();
            $table->string('target_sasaran_strategis')->nullable();
            $table->string('realisasi')->nullable();
            $table->string('karakteristik')->nullable();
            $table->string('capaian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengukuran_kinerjas');
    }
};
