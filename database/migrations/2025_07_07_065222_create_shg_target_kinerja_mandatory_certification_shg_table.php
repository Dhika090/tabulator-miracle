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
        Schema::create('shg_target_kinerja_mandatory_certification_shg', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('subholding')->nullable();
            $table->string('company')->nullable();
            $table->string('unit')->nullable();
            $table->string('posisi_awal_tahun')->nullable();
            $table->string('posisi_vacant_awal_tahun')->nullable();
            $table->string('posisi_terisi_awal_tahun')->nullable();
            $table->string('target_personil_memenuhi_sertifikasi_tahunan')->nullable();
            $table->string('jumlah_sertifikasi_sudah_terbit')->nullable();
            $table->string('jumlah_sertifikasi_belum_terbit')->nullable();
            $table->string('jumlah_learning_hours')->nullable();
            $table->string('jumlah_learning_hours_kumulatif')->nullable();
            $table->string('jumlah_sertifikasi_sudah_terbit_kumulatif')->nullable();
            $table->string('target_personil_memenuhi_sertifikasi_bulanan')->nullable();
            $table->string('target_personil_memenuhi_sertifikasi_kumulatif')->nullable();
            $table->string('target_kpi')->nullable();
            $table->string('target_kpi_kumulatif')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_target_kinerja_mandatory_certification_shg');
    }
};
