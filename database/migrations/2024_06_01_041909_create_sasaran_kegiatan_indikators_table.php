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
        Schema::create('sasaran_kegiatan_indikators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('sasaran_kegiatan_id')->onDelete('cascade');
            $table->string('indikator_kegiatan')->nullable();
            $table->double('target')->nullable();
            $table->foreignId('satuan_id')->onDelete('cascade');
            $table->string('kegiatan')->nullable();
            $table->double('anggaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sasaran_kegiatan_indikators');
    }
};
