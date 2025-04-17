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
        Schema::create('mandatory_certification_ptg', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->string('subholding');
            $table->string('company');
            $table->string('unit');
            $table->string('nama_sertifikasi')->nullable();
            $table->string('lembaga_penerbit_sertifikat')->nullable();
            $table->integer('jumlah_sertifikasi_terbit')->nullable();
            $table->integer('jumlah_learning_hours')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandatory_certification_ptg');
    }
};
