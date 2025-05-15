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
        Schema::create('shg_omm_status_plo', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->string('nomor_plo')->nullable();
            $table->string('company')->nullable();
            $table->string('area')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('nama_aset')->nullable();
            $table->string('tanggal_pengesahan')->nullable();
            $table->string('masa_berlaku')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('belum_proses')->nullable();
            $table->integer('pre_inspection')->nullable();
            $table->integer('inspection')->nullable();
            $table->integer('coi_peralatan')->nullable();
            $table->integer('ba_pk')->nullable();
            $table->integer('penerbitan_plo_valid')->nullable();
            $table->string('kendala')->nullable();
            $table->string('tindak_lanjut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_omm_status_plo');
    }
};
