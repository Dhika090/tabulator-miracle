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
        Schema::create('shg_pertamina_asset_breakdown_ptg', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->string('company');
            $table->string('plant_segment');
            $table->string('kategori_criticality');
            $table->string('tag');
            $table->string('deskripsi_peralatan');
            $table->string('jenis_kerusakan');
            $table->string('penyebab')->nullable();
            $table->string('kendala_perbaikan')->nullable();
            $table->string('mitigasi')->nullable();
            $table->string('perbaikan_permanen')->nullable();
            $table->string('progres_perbaikan_permanen')->nullable();
            $table->string('tindak_lanjut')->nullable();
            $table->string('target_penyelesaian')->nullable();
            $table->double('estimasi_biaya_perbaikan')->nullable();
            $table->string('link_foto_video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_pertamina_asset_breakdown_ptg');
    }
};
