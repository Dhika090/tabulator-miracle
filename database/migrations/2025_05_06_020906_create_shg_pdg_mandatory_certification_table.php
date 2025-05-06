<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shg_pdg_mandatory_certification', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
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
        Schema::dropIfExists('shg_pdg_mandatory_certification');
    }
};
