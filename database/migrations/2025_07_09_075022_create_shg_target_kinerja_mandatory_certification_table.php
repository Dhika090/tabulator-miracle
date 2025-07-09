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
        Schema::create('shg_target_kinerja_mandatory_certification', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('periode')->nullable();
            $table->string('subholding')->nullable();
            $table->string('company')->nullable();
            $table->string('unit')->nullable();
            $table->decimal('posisi_awal_tahun', 18, 2)->nullable();
            $table->decimal('posisi_vacant_awal_tahun', 18, 2)->nullable();
            $table->decimal('posisi_terisi_awal_tahun', 18, 2)->nullable();
            $table->decimal('target_personil_memenuhi_sertifikasi_tahunan', 18, 2)->nullable();
            $table->decimal('target_personil_memenuhi_sertifikasi_bulanan', 18, 2)->nullable();
            $table->decimal('target_personil_memenuhi_sertifikasi_kumulatif', 18, 2)->nullable();
            $table->decimal('target_kpi', 18, 2)->nullable();
            $table->decimal('target_kpi_kumulatif', 18, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_target_kinerja_mandatory_certification');
    }
};
