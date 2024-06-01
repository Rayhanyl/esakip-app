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
        Schema::create('sasaran_sub_kegiatan_indikators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('sasaran_sub_kegiatan_id')->onDelete('cascade');
            $table->string('indikator_sub_kegiatan')->nullable();
            $table->double('target')->nullable();
            $table->double('triwulan1')->nullable();
            $table->double('triwulan2')->nullable();
            $table->double('triwulan3')->nullable();
            $table->double('triwulan4')->nullable();
            $table->string('sub_kegiatan')->nullable();
            $table->double('anggaran')->nullable();
            $table->string('satuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sasaran_sub_kegiatan_indikators');
    }
};
