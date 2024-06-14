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
        Schema::create('perda_peng_sub_tahuns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('perda_pengukuran_id');
            $table->foreignId('perda_sastra_id');
            $table->foreignId('perda_sastra_in_id');
            $table->double('target');
            $table->double('realisasi');
            $table->string('karakteristik');
            $table->double('capaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perda_peng_sub_tahuns');
    }
};
