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
        Schema::create('sasaran_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('sasaran_program_id');
            $table->foreignId('pengampu_id');
            $table->integer('tahun')->nullable();
            $table->string('sasaran_kegiatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sasaran_kegiatans');
    }
};
