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
        Schema::create('shu_realisasi_anggaran_figure_regional_2', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->integer('no')->nullable();
            $table->string('kategori_aibt')->nullable();
            $table->string('jenis_anggaran')->nullable();
            $table->string('besar_rkap')->nullable();
            $table->string('entitas')->nullable();
            $table->string('unit')->nullable();
            $table->decimal('nilai_kontrak', 18, 2)->nullable();
            $table->decimal('plan_jan', 18, 2)->nullable();
            $table->decimal('plan_feb', 18, 2)->nullable();
            $table->decimal('plan_mar', 18, 2)->nullable();
            $table->decimal('plan_apr', 18, 2)->nullable();
            $table->decimal('plan_mei', 18, 2)->nullable();
            $table->decimal('plan_jun', 18, 2)->nullable();
            $table->decimal('plan_jul', 18, 2)->nullable();
            $table->decimal('plan_agu', 18, 2)->nullable();
            $table->decimal('plan_sep', 18, 2)->nullable();
            $table->decimal('plan_okt', 18, 2)->nullable();
            $table->decimal('plan_nov', 18, 2)->nullable();
            $table->decimal('plan_des', 18, 2)->nullable();
            $table->decimal('prognosa_jan', 18, 2)->nullable();
            $table->decimal('prognosa_feb', 18, 2)->nullable();
            $table->decimal('prognosa_mar', 18, 2)->nullable();
            $table->decimal('prognosa_apr', 18, 2)->nullable();
            $table->decimal('prognosa_mei', 18, 2)->nullable();
            $table->decimal('prognosa_jun', 18, 2)->nullable();
            $table->decimal('prognosa_jul', 18, 2)->nullable();
            $table->decimal('prognosa_agu', 18, 2)->nullable();
            $table->decimal('prognosa_sep', 18, 2)->nullable();
            $table->decimal('prognosa_okt', 18, 2)->nullable();
            $table->decimal('prognosa_nov', 18, 2)->nullable();
            $table->decimal('prognosa_des', 18, 2)->nullable();
            $table->decimal('actual_jan', 18, 2)->nullable();
            $table->decimal('actual_feb', 18, 2)->nullable();
            $table->decimal('actual_mar', 18, 2)->nullable();
            $table->decimal('actual_apr', 18, 2)->nullable();
            $table->decimal('actual_mei', 18, 2)->nullable();
            $table->decimal('actual_jun', 18, 2)->nullable();
            $table->decimal('actual_jul', 18, 2)->nullable();
            $table->decimal('actual_agu', 18, 2)->nullable();
            $table->decimal('actual_sep', 18, 2)->nullable();
            $table->decimal('actual_okt', 18, 2)->nullable();
            $table->decimal('actual_nov', 18, 2)->nullable();
            $table->decimal('actual_des', 18, 2)->nullable();
            $table->string('kode')->nullable();
            $table->string('kendala', 500)->nullable();
            $table->string('tindak_lanjut', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shu_realisasi_anggaran_figure_regional_2');
    }
};
