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
        Schema::create('perda_pengukuran_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('tahun')->nullable();
            $table->foreignId('sasaran_strategis_id');
            $table->foreignId('sasaran_strategis_indikator_id');
            $table->foreignId('sasaran_sub_kegiatan_id');
            $table->foreignId('sasaran_sub_kegiatan_indikator_id');
            $table->foreignId('sasaran_sub_kegiatan_target')->nullable();
            $table->double('realisasi')->nullable();
            $table->enum('karakteristik', ['1', '2'])->nullable();
            $table->double('capaian')->nullable();
            $table->foreignId('anggaran_sub_kegiatan_id');
            $table->double('anggaran_pagu')->nullable();
            $table->double('anggaran_realisasi')->nullable();
            $table->double('anggaran_capaian')->nullable();
            $table->double('tahunan_sasaran_strategis_id');
            $table->double('tahunan_sasaran_strategis_indikator_id');
            $table->double('tahunan_target')->nullable();
            $table->double('tahunan_realisasi')->nullable();
            $table->enum('tahunan_karakteristik', ['1', '2'])->nullable();
            $table->double('tahunan_capaian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perda_pengukuran_kinerjas');
    }
};
