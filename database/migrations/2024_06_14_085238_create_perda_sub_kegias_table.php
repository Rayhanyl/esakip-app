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
        Schema::create('perda_sub_kegias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('perda_kegia_id');
            $table->text('sasaran');
            $table->unsignedInteger('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perda_sub_kegias');
    }
};
