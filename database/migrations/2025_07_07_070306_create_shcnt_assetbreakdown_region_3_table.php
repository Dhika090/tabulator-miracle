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
        Schema::create('shcnt_assetbreakdown_region_3', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('company')->nullable();
            $table->string('plant_segment')->nullable();
            $table->string('kategori_criticality')->nullable();
            $table->string('tag')->nullable();
            $table->string('deskripsi_peralatan')->nullable();
            $table->string('jenis_kerusakan')->nullable();
            $table->string('penyebab')->nullable();
            $table->string('kendala_perbaikan')->nullable();
            $table->string('mitigasi')->nullable();
            $table->string('perbaikan_permanen')->nullable();
            $table->string('progres_perbaikan_permanen')->nullable();
            $table->text('tindak_lanjut')->nullable();
            $table->string('target_penyelesaian')->nullable();
            $table->string('estimasi_biaya_perbaikan')->nullable();
            $table->string('link_foto_video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shcnt_assetbreakdown_region_3');
    }
};
