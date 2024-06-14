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
        Schema::create('pemkab_pengukurans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('pemkab_sastra_id');
            $table->foreignId('pemkab_sastra_in_id');
            $table->double('target');
            $table->double('realisasi');
            $table->double('capaian');
            $table->string('karakteristik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemkab_pengukurans');
    }
};
