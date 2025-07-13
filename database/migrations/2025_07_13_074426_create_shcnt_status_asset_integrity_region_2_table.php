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
        Schema::create('shcnt_status_asset_integrity_region_2', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('subholding')->nullable();
            $table->string('company')->nullable();
            $table->string('unit')->nullable();
            $table->string('asset_group')->nullable();
            $table->integer('jumlah')->nullable();

            // SECE
            $table->integer('sece_low_breakdown')->nullable();
            $table->integer('sece_medium_due_date_inspection')->nullable();
            $table->integer('sece_medium_low_condition')->nullable();
            $table->integer('sece_medium_low_performance')->nullable();
            $table->integer('sece_high')->nullable();

            // PCE
            $table->integer('pce_low_breakdown')->nullable();
            $table->integer('pce_medium_due_date_inspection')->nullable();
            $table->integer('pce_medium_low_condition')->nullable();
            $table->integer('pce_medium_low_performance')->nullable();
            $table->integer('pce_high')->nullable();

            // IMPORTANT
            $table->integer('important_low_breakdown')->nullable();
            $table->integer('important_medium_due_date_inspection')->nullable();
            $table->integer('important_medium_low_condition')->nullable();
            $table->integer('important_medium_low_performance')->nullable();
            $table->integer('important_high')->nullable();

            // SECONDARY
            $table->integer('secondary_low_breakdown')->nullable();
            $table->integer('secondary_medium_due_date_inspection')->nullable();
            $table->integer('secondary_medium_low_condition')->nullable();
            $table->integer('secondary_medium_low_performance')->nullable();
            $table->integer('secondary_high')->nullable();

            // Informasi & Kegiatan
            $table->integer('kegiatan_penurunan_low')->nullable();
            $table->integer('kegiatan_penurunan_med')->nullable();
            $table->text('penyebab_low_integrity')->nullable();
            $table->text('penambahan_jumlah_aset')->nullable();
            $table->text('naik_turun_low_integrity')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shcnt_status_asset_integrity_region_2');
    }
};
