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
        Schema::create('shcnt_mandatory_certification_region_8', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('subholding')->nullable();
            $table->string('company')->nullable();
            $table->string('unit')->nullable();
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
        Schema::dropIfExists('shcnt_mandatory_certification_region_8');
    }
};
