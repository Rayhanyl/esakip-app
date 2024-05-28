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
        Schema::create('perencanaan_kinerja_strategic_targets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('year')->nullable();
            $table->string('sasaran_bupati')->nullable();
            $table->string('pengampu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perencanaan_kinerja_strategic_targets');
    }
};
