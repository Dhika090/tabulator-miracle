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
        Schema::create('shg_pertamina_sap_asset_ptg', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->string('subholding');
            $table->string('company');
            $table->string('unit');
            $table->string('nama_stasiun');
            $table->integer('belum_mulai')->nullable();
            $table->integer('kickoff_meeting')->nullable();
            $table->integer('identifikasi_peralatan')->nullable();
            $table->integer('survey_lapangan')->nullable();
            $table->integer('pembenahan_funloc')->nullable();
            $table->integer('review_criticality')->nullable();
            $table->integer('penyelarasan_dokumen')->nullable();
            $table->integer('melengkapi_tag_fisik')->nullable();
            $table->integer('form_upload_data')->nullable();
            $table->integer('request_master_data')->nullable();
            $table->integer('update_master_data')->nullable();
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
        Schema::dropIfExists('shg_pertamina_sap_asset_ptg');
    }
};
