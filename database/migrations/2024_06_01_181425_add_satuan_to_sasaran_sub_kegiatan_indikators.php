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
        Schema::table('sasaran_sub_kegiatan_indikators', function (Blueprint $table) {
            $table->string('satuan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sasaran_sub_kegiatan_indikators', function (Blueprint $table) {
            //
        });
    }
};
