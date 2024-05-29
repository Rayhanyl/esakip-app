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
        Schema::create('perda_perencanaan_kinerja_sub_activity_target_indicators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perda_perencanaan_kinerja_sub_activity_target_id');
            $table->string('indikator_sub_kegiatan')->nullable();
            $table->string('target')->nullable();
            $table->string('triwulan1')->nullable();
            $table->string('triwulan2')->nullable();
            $table->string('triwulan3')->nullable();
            $table->string('triwulan4')->nullable();
            $table->string('satuan')->nullable();
            $table->string('sub_kegiatan')->nullable();
            $table->string('anggaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkat_daerah_perencanaan_kinerja_sub_activity_target_indicators');
    }
};
