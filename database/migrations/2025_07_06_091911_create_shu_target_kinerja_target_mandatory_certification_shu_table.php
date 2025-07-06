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
        Schema::create('shu_target_kinerja_target_mandatory_certification_shu', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('periode')->nullable();
            $table->string('subholding')->nullable();
            $table->string('company')->nullable();
            $table->string('unit')->nullable();
            $table->integer('posisi_awal_tahun')->nullable();
            $table->integer('posisi_vacant_awal_tahun')->nullable();
            $table->integer('posisi_terisi_awal_tahun')->nullable();
            $table->integer('target_personil_memenuhi_sertifikasi_tahunan')->nullable();

            $table->decimal('jumlah_sertifikasi_sudah_terbit', 10, 2)->nullable();            
            $table->decimal('jumlah_sertifikasi_belum_terbit', 10, 2)->nullable();
            $table->decimal('jumlah_learning_hours', 10, 2)->nullable();
            $table->decimal('jumlah_learning_hours_kumulatif', 10, 2)->nullable();
            $table->decimal('jumlah_sertifikasi_sudah_terbit_kumulatif', 10, 2)->nullable();

            $table->integer('target_personil_memenuhi_sertifikasi_bulanan')->nullable();
            $table->integer('target_personil_memenuhi_sertifikasi_kumulatif')->nullable();
            $table->integer('target_kpi')->nullable();
            $table->integer('target_kpi_kumulatif')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shu_target_kinerja_target_mandatory_certification_shu');
    }
};
