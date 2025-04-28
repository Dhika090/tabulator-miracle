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
            $table->string('periode');
            $table->string('subholding');
            $table->string('company');
            $table->string('unit');
            $table->string('asset_group');
            $table->integer('jumlah')->nullable();

            // SECE
            $table->integer('sece_low_integrity_breakdown')->nullable();
            $table->integer('sece_medium_due_date_inspection')->nullable();
            $table->integer('sece_medium_low_condition')->nullable();
            $table->integer('sece_medium_low_performance')->nullable();
            $table->integer('sece_high_integrity')->nullable();

            // PCE
            $table->integer('pce_low_integrity_breakdown')->nullable();
            $table->integer('pce_medium_due_date_inspection')->nullable();
            $table->integer('pce_medium_low_condition')->nullable();
            $table->integer('pce_medium_low_performance')->nullable();
            $table->integer('pce_high_integrity')->nullable();

            // IMPORTANT
            $table->integer('important_low_integrity_breakdown')->nullable();
            $table->integer('important_medium_due_date_inspection')->nullable();
            $table->integer('important_medium_low_condition')->nullable();
            $table->integer('important_medium_low_performance')->nullable();
            $table->integer('important_high_integrity')->nullable();

            // SECONDARY
            $table->integer('secondary_low_integrity_breakdown')->nullable();
            $table->integer('secondary_medium_due_date_inspection')->nullable();
            $table->integer('secondary_medium_low_condition')->nullable();
            $table->integer('secondary_medium_low_performance')->nullable();
            $table->integer('secondary_high_integrity')->nullable();

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
        Schema::dropIfExists('shg_kalimantan_jawa_gas');
    }
};
