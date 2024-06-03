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
        Schema::create('sasaran_program_indikators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('sasaran_program_id')->onDelete('cascade');
            $table->string('indikator_sasaran_program')->nullable();
            $table->double('target')->nullable();
            $table->foreignId('satuan_id')->onDelete('cascade');
            $table->string('program')->nullable();
            $table->double('anggaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sasaran_program_indikators');
    }
};
