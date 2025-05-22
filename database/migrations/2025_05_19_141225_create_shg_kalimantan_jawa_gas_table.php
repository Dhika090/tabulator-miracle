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
        Schema::create('shg_kalimantan_jawa_gas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('subholding')->nullable();
            $table->string('company')->nullable();
            $table->string('unit')->nullable();
            $table->string('asset_group')->nullable();
            $table->integer('jumlah')->nullable();

            // SECE
            $table->string('sece_low_breakdown')->nullable();
            $table->string('sece_medium_due_date_inspection')->nullable();
            $table->string('sece_medium_low_condition')->nullable();
            $table->string('sece_medium_low_performance')->nullable();
            $table->string('sece_high')->nullable();

            // PCE
            $table->string('pce_low_breakdown')->nullable();
            $table->string('pce_medium_due_date_inspection')->nullable();
            $table->string('pce_medium_low_condition')->nullable();
            $table->string('pce_medium_low_performance')->nullable();
            $table->string('pce_high')->nullable();

            // IMPORTANT
            $table->string('important_low_breakdown')->nullable();
            $table->string('important_medium_due_date_inspection')->nullable();
            $table->string('important_medium_low_condition')->nullable();
            $table->string('important_medium_low_performance')->nullable();
            $table->string('important_high')->nullable();

            // SECONDARY
            $table->string('secondary_low_breakdown')->nullable();
            $table->string('secondary_medium_due_date_inspection')->nullable();
            $table->string('secondary_medium_low_condition')->nullable();
            $table->string('secondary_medium_low_performance')->nullable();
            $table->string('secondary_high')->nullable();

            // Informasi & Kegiatan
            $table->string('kegiatan_penurunan_low')->nullable();
            $table->string('kegiatan_penurunan_med')->nullable();
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
        Schema::dropIfExists('shg_kalimantan_jawa_gas');
    }
};
