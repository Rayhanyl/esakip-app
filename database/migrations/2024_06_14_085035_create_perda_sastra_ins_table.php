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
        Schema::create('perda_sastra_ins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('perda_sastra_id');
            $table->foreignId('satuan_id');
            $table->text('indikator');
            $table->double('target1');
            $table->double('target2');
            $table->double('target3');
            $table->string('tipe_perhitungan');
            $table->text('penjelasan');
            $table->text('sumber_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perda_sastra_ins');
    }
};
