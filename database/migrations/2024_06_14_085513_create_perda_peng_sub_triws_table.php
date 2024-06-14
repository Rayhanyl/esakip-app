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
        Schema::create('perda_peng_sub_triws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('perda_pengukuran_id');
            $table->foreignId('perda_sastra_id');
            $table->foreignId('perda_sastra_in_id');
            $table->foreignId('perda_subkegia_id');
            $table->foreignId('perda_subkegia_in_id');
            $table->double('target_sub');
            $table->double('realisasi');
            $table->string('karakteristik');
            $table->double('capaian');
            $table->text('anggaran_sub');
            $table->double('anggaran_pagu');
            $table->double('anggaran_realisasi');
            $table->double('anggaran_capaian');
            $table->string('tipe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perda_peng_sub_triws');
    }
};
