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
        Schema::create('perangkat_daerah_pengukuran_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('triwulan');
            $table->foreignId('perencanaan_kinerja_strategic_target_id');
            $table->string('indikator_sasaran');
            $table->foreignId('sub_activity_id');
            $table->string('indikator_sub_kegiatan');
            $table->string('target');
            $table->string('realisasi');
            $table->string('karakteristik');
            $table->string('capaian');
            $table->string('anggaran_sub_kegiatan');
            $table->string('anggaran_pagu');
            $table->string('anggaran_realisasi');
            $table->string('anggaran_capaian');
            $table->string('tahunan_sasaran_strategis');
            $table->string('tahunan_indikator_sasaran');
            $table->string('tahunan_target');
            $table->string('tahunan_realisasi');
            $table->string('tahunan_karateristik');
            $table->string('tahunan_capaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkat_daerah_pengukuran_kinerjas');
    }
};
