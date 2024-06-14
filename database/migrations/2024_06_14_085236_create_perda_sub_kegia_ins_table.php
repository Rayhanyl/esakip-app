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
        Schema::create('perda_sub_kegia_ins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('perda_subkegia_id');
            $table->foreignId('satuan_id');
            $table->text('indikator');
            $table->double('target');
            $table->double('triwulan1');
            $table->double('triwulan2');
            $table->double('triwulan3');
            $table->double('triwulan4');
            $table->text('subkegiatan');
            $table->double('anggaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perda_sub_kegia_ins');
    }
};
