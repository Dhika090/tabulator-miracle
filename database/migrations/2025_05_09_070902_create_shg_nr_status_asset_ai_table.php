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
        Schema::create('shg_nr_status_asset_ai', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->string('subholding');
            $table->string('company');
            $table->string('unit');
            $table->string('asset_group');
            $table->string('jumlah')->nullable();

            // SECE
            $table->string('sece_low_integrity_breakdown')->nullable();
            $table->string('sece_medium_due_date_inspection')->nullable();
            $table->string('sece_medium_low_condition')->nullable();
            $table->string('sece_medium_low_performance')->nullable();
            $table->string('sece_high_integrity')->nullable();

            // PCE
            $table->string('pce_low_integrity_breakdown')->nullable();
            $table->string('pce_medium_due_date_inspection')->nullable();
            $table->string('pce_medium_low_condition')->nullable();
            $table->string('pce_medium_low_performance')->nullable();
            $table->string('pce_high_integrity')->nullable();

            // IMPORTANT
            $table->string('important_low_integrity_breakdown')->nullable();
            $table->string('important_medium_due_date_inspection')->nullable();
            $table->string('important_medium_low_condition')->nullable();
            $table->string('important_medium_low_performance')->nullable();
            $table->string('important_high_integrity')->nullable();

            // SECONDARY
            $table->string('secondary_low_integrity_breakdown')->nullable();
            $table->string('secondary_medium_due_date_inspection')->nullable();
            $table->string('secondary_medium_low_condition')->nullable();
            $table->string('secondary_medium_low_performance')->nullable();
            $table->string('secondary_high_integrity')->nullable();

            // Informasi lainnya
            $table->text('kegiatan_penurunan_low')->nullable();
            $table->text('kegiatan_penurunan_med')->nullable();
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
        Schema::dropIfExists('shg_nr_status_asset_ai');
    }
};
