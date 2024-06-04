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
        Schema::create('pengampu_sementaras', function (Blueprint $table) {
            $table->id();
            $table->string('nip_baru')->nullable();
            $table->string('nama_pegawai')->nullable();
            $table->string('organisasi')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('pelaksana')->nullable();
            $table->string('fungsional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengampu_sementaras');
    }
};
