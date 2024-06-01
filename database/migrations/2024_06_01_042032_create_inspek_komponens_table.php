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
        Schema::create('inspek_komponens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('inspek_evaluasi_internal_id');
            $table->string('no')->nullable();
            $table->string('komponen')->nullable();
            $table->double('bobot')->nullable();
            $table->double('nilai')->nullable();
            $table->string('jawaban')->nullable();
            $table->string('catatan')->nullable();
            $table->string('rekomendasi')->nullable();
            $table->enum('status', ['1', '2'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspek_komponens');
    }
};
