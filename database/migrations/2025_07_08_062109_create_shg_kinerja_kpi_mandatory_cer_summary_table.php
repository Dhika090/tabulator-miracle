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
        Schema::create('shg_kinerja_kpi_mandatory_cer_summary', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('subholding')->nullable();
            $table->string('company')->nullable();
            $table->string('unit')->nullable();
            $table->integer('posisi_awal_tahun')->nullable();
            $table->integer('posisi_vacant_awal_tahun')->nullable();
            $table->integer('posisi_terisi_awal_tahun')->nullable();
            $table->integer('target_personil_memenuhi_sertifikasi_tahunan')->nullable();
            $table->integer('jumlah_sertifikasi_sudah_terbit')->nullable();
            $table->integer('jumlah_sertifikasi_belum_terbit')->nullable();
            $table->integer('jumlah_learning_hours')->nullable();
            $table->integer('jumlah_learning_hours_kumulatif')->nullable();
            $table->integer('jumlah_sertifikasi_sudah_terbit_kumulatif')->nullable();
            $table->integer('target_personil_memenuhi_sertifikasi_bulanan')->nullable();
            $table->integer('target_personil_memenuhi_sertifikasi_kumulatif')->nullable();
            $table->integer('target_kpi')->nullable();
            $table->decimal('real', 10, 2)->nullable();
            $table->decimal('real_kumulatif', 10, 2)->nullable();
            $table->decimal('real_kpi', 10, 2)->nullable();
            $table->decimal('real_kpi_kumulatif', 10, 2)->nullable();
            $table->decimal('kpi_summary', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_kinerja_kpi_mandatory_cer_summary');
    }
};
