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
        Schema::create('shcnt_sap_asset_region_6', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('periode')->nullable();
            $table->string('subholding')->nullable();
            $table->string('company')->nullable();
            $table->string('unit')->nullable();
            $table->string('nama_stasiun')->nullable();
            $table->string('belum_mulai')->nullable();
            $table->string('kickoff_meeting')->nullable();
            $table->string('identifikasi_peralatan')->nullable();
            $table->string('survey_lapangan')->nullable();
            $table->string('pembenahan_funloc')->nullable();
            $table->string('review_criticality')->nullable();
            $table->string('penyelarasan_dokumen_dan_lapangan')->nullable();
            $table->string('melengkapi_tag_fisik')->nullable();
            $table->string('mempersiapkan_form_upload_data')->nullable();
            $table->string('request_ke_master_data')->nullable();
            $table->string('update_di_master_data')->nullable();
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
        Schema::dropIfExists('shcnt_sap_asset_region_6');
    }
};
