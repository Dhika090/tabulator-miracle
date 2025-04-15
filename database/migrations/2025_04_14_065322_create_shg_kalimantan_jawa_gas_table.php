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
        Schema::create('shg_kalimantan_jawa_gas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->string('subholding');
            $table->string('company');
            $table->string('unit');
            $table->string('asset_group');
            $table->integer('jumlah');

            $table->float('sece_low_integrity_breakdown')->nullable();
            $table->float('sece_medium_integrity_due_date_inspection')->nullable();
            $table->float('sece_medium_integrity_low_condition')->nullable();
            $table->float('sece_medium_integrity_low_performance')->nullable();
            $table->float('sece_high_integrity')->nullable();

            $table->float('pce_low_integrity_breakdown')->nullable();
            $table->float('pce_medium_integrity_due_date_inspection')->nullable();
            $table->float('pce_medium_integrity_low_condition')->nullable();
            $table->float('pce_medium_integrity_low_performance')->nullable();
            $table->float('pce_high_integrity')->nullable();

            $table->float('important_low_integrity_breakdown')->nullable();
            $table->float('important_medium_integrity_due_date_inspection')->nullable();
            $table->float('important_medium_integrity_low_condition')->nullable();
            $table->float('important_medium_integrity_low_performance')->nullable();
            $table->float('important_high_integrity')->nullable();

            $table->float('secondary_low_integrity_breakdown')->nullable();
            $table->float('secondary_medium_integrity_due_date_inspection')->nullable();
            $table->float('secondary_medium_integrity_low_condition')->nullable();
            $table->float('secondary_medium_integrity_low_performance')->nullable();
            $table->float('secondary_high_integrity')->nullable();

            $table->string('kegiatan_penurunan_low')->nullable();
            $table->string('kegiatan_penurunan_med')->nullable();
            $table->string('informasi_penyebab_low_integrity')->nullable();
            $table->string('informasi_penambahan_jumlah_aset')->nullable();
            $table->string('informasi_naik_turun_low_integrity')->nullable();
            
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
