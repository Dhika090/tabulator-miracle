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
        Schema::create('shu_status_ai_regional_2', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode', 20)->nullable();
            $table->string('subholding', 250)->nullable();
            $table->string('company', 250)->nullable();
            $table->string('unit', 250)->nullable();
            $table->string('asset_group', 250)->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('sece_low_integrity_breakdown')->nullable();
            $table->integer('sece_medium_integrity_due_date_inspection')->nullable();
            $table->integer('sece_medium_integrity_low_condition')->nullable();
            $table->integer('sece_medium_integrity_low_performance')->nullable();
            $table->integer('sece_high_integrity')->nullable();
            $table->integer('pce_low_integrity_breakdown')->nullable();
            $table->integer('pce_medium_integrity_due_date_inspection')->nullable();
            $table->integer('pce_medium_integrity_low_condition')->nullable();
            $table->integer('pce_medium_integrity_low_performance')->nullable();
            $table->integer('pce_high_integrity')->nullable();
            $table->integer('important_low_integrity_breakdown')->nullable();
            $table->integer('important_medium_integrity_due_date_inspection')->nullable();
            $table->integer('important_medium_integrity_low_condition')->nullable();
            $table->integer('important_medium_integrity_low_performance')->nullable();
            $table->integer('important_high_integrity')->nullable();
            $table->integer('secondary_low_integrity_breakdown')->nullable();
            $table->integer('secondary_medium_integrity_due_date_inspection')->nullable();
            $table->integer('secondary_medium_integrity_low_condition')->nullable();
            $table->integer('secondary_medium_integrity_low_performance')->nullable();
            $table->integer('secondary_high_integrity')->nullable();
            $table->integer('kegiatan_penurunan_low')->nullable();
            $table->integer('kegiatan_penurunan_med')->nullable();
            $table->string('tanggal_realisasi')->nullable();
            $table->string('tanggal_prognosa')->nullable();
            $table->text('informasi_penyebab_low_integrity')->nullable();
            $table->text('informasi_penambahan_jumlah_aset')->nullable();
            $table->text('informasi_naik_turun_low_integrity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shu_status_ai_regional_2');
    }
};
