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
        Schema::create('shcnt_status_plo_region_3', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('nomor_plo')->nullable();
            $table->string('company')->nullable();
            $table->string('area')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('nama_aset')->nullable();
            $table->string('tanggal_pengesahan')->nullable();
            $table->string('masa_berlaku')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('belum_proses')->nullable();
            $table->string('pre_inspection')->nullable();
            $table->string('inspection')->nullable();
            $table->string('coi_peralatan')->nullable();
            $table->string('ba_pk')->nullable();
            $table->string('penerbitan_plo_valid')->nullable();
            $table->string('kendala', 550)->nullable();
            $table->string('tindak_lanjut', 550)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shcnt_status_plo_region_3');
    }
};
