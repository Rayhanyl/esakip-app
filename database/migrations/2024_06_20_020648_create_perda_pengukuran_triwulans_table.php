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
        Schema::create('perda_pengukuran_triwulans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('perda_sastra_id');
            $table->foreignId('perda_sastra_in_id');
            $table->foreignId('perda_sub_kegia_id');
            $table->foreignId('perda_sub_kegia_in_id');
            $table->double('perda_sub_kegia_target');
            $table->double('realisasi');
            $table->string('karakteristik');
            $table->double('capaian');
            $table->foreignId('anggaran_perda_sub_kegia_id');
            $table->double('anggaran_perda_sub_kegia_pagu');
            $table->double('anggaran_perda_sub_kegia_realisasi');
            $table->double('anggaran_perda_sub_kegia_capaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perda_pengukuran_triwulans');
    }
};
