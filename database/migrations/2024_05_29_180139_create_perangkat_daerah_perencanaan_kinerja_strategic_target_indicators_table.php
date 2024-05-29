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
        Schema::create('perangkat_daerah_perencanaan_kinerja_strategic_target_indicators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perangkat_daerah_perencanaan_kinerja_strategic_target_id');
            $table->string('indikator_sasaran')->nullable();
            $table->string('target1')->nullable();
            $table->string('target2')->nullable();
            $table->string('target3')->nullable();
            $table->string('satuan')->nullable();
            $table->string('penjelasan')->nullable();
            $table->string('tipe_perhitungan')->nullable();
            $table->string('sumber_data')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkat_daerah_perencanaan_kinerja_strategic_target_indicators');
    }
};
