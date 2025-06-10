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
        Schema::create('shpnre_karaha_summary_plo', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('company')->nullable();
            $table->integer('total_plo_exp')->nullable();
            $table->integer('total_plo_exp_lt6')->nullable();
            $table->integer('total_plo_valid')->nullable();
            $table->integer('total_plo_exp_belum_proses')->nullable();
            $table->integer('total_plo_exp_pre_inspection')->nullable();
            $table->integer('total_plo_exp_inspection')->nullable();
            $table->integer('total_plo_exp_ba_pk')->nullable();
            $table->integer('total_plo_exp_coi_peralatan')->nullable();
            $table->integer('total_plo_exp_penerbitan_plo')->nullable();
            $table->integer('total_plo_exp_lt6_belum_proses')->nullable();
            $table->integer('total_plo_exp_lt6_pre_inspection')->nullable();
            $table->integer('total_plo_exp_lt6_inspection')->nullable();
            $table->integer('total_plo_exp_lt6_ba_pk')->nullable();
            $table->integer('total_plo_exp_lt6_coi_peralatan')->nullable();
            $table->integer('total_plo_exp_lt6_penerbitan_plo')->nullable();
            $table->integer('total_plo_valid_belum_proses')->nullable();
            $table->integer('total_plo_valid_pre_inspection')->nullable();
            $table->integer('total_plo_valid_inspection')->nullable();
            $table->integer('total_plo_valid_ba_pk')->nullable();
            $table->integer('total_plo_valid_coi_peralatan')->nullable();
            $table->integer('total_plo_valid_penerbitan_plo')->nullable();
            $table->text('kendala')->nullable();
            $table->text('tindak_lanjut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shpnre_karaha_summary_plo');
    }
};
