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
        Schema::create('sasaran_bupati_indikators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('sasaran_bupati_id')->onDelete('cascade');
            $table->string('indikator_sasaran_bupati')->nullable();
            $table->double('target1')->nullable();
            $table->double('target2')->nullable();
            $table->double('target3')->nullable();
            $table->foreignId('satuan_id')->onDelete('cascade');
            $table->foreignId('penanggung_jawab_id')->onDelete('cascade');
            $table->string('penjelasan')->nullable();
            $table->enum('tipe_perhitungan', ['1', '2'])->nullable();
            $table->string('sumber_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sasaran_bupati_indikators');
    }
};
