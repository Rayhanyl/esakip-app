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
        Schema::create('inspek_kriterias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('inspek_sub_komponen_id')->onDelete('cascade');
            $table->string('no')->nullable();
            $table->string('kriteria')->nullable();
            $table->enum('status', ['1', '2'])->nullable();
            $table->string('upload')->nullable();
            $table->string('catatan')->nullable();
            $table->string('rekomendasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspek_kriterias');
    }
};
