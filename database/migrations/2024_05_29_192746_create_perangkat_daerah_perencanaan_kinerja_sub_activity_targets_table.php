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
        Schema::create('perda_perencanaan_kinerja_sub_activity_targets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('year')->nullable();
            $table->foreignId('perda_perencanaan_kinerja_activity_target_id');
            $table->string('pengampu')->nullable();
            $table->string('sasaran_sub_kegiatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkat_daerah_perencanaan_kinerja_sub_activity_targets');
    }
};
