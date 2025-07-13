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
        Schema::create('shcnt_realisasi_anggaran_ai_region_3', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->integer('no')->nullable();
            $table->string('program_kerja')->nullable();
            $table->string('kategori_aibt')->nullable();
            $table->string('jenis_anggaran')->nullable();
            $table->string('besar_rkap')->nullable();
            $table->string('entitas')->nullable();
            $table->string('unit')->nullable();
            $table->string('nilai_kontrak')->nullable();
            $table->decimal('plan_jan', 18, 2)->nullable();
            $table->decimal('plan_feb', 18, 2)->nullable();
            $table->decimal('plan_mar', 18, 2)->nullable();
            $table->decimal('plan_apr', 18, 2)->nullable();
            $table->decimal('plan_may', 18, 2)->nullable();
            $table->decimal('plan_jun', 18, 2)->nullable();
            $table->decimal('plan_jul', 18, 2)->nullable();
            $table->decimal('plan_aug', 18, 2)->nullable();
            $table->decimal('plan_sep', 18, 2)->nullable();
            $table->decimal('plan_oct', 18, 2)->nullable();
            $table->decimal('plan_nov', 18, 2)->nullable();
            $table->decimal('plan_dec', 18, 2)->nullable();
            $table->decimal('prognosa_jan', 18, 2)->nullable();
            $table->decimal('prognosa_feb', 18, 2)->nullable();
            $table->decimal('prognosa_mar', 18, 2)->nullable();
            $table->decimal('prognosa_apr', 18, 2)->nullable();
            $table->decimal('prognosa_may', 18, 2)->nullable();
            $table->decimal('prognosa_jun', 18, 2)->nullable();
            $table->decimal('prognosa_jul', 18, 2)->nullable();
            $table->decimal('prognosa_aug', 18, 2)->nullable();
            $table->decimal('prognosa_sep', 18, 2)->nullable();
            $table->decimal('prognosa_oct', 18, 2)->nullable();
            $table->decimal('prognosa_nov', 18, 2)->nullable();
            $table->decimal('prognosa_dec', 18, 2)->nullable();
            $table->decimal('actual_jan', 18, 2)->nullable();
            $table->decimal('actual_feb', 18, 2)->nullable();
            $table->decimal('actual_mar', 18, 2)->nullable();
            $table->decimal('actual_apr', 18, 2)->nullable();
            $table->decimal('actual_may', 18, 2)->nullable();
            $table->decimal('actual_jun', 18, 2)->nullable();
            $table->decimal('actual_jul', 18, 2)->nullable();
            $table->decimal('actual_aug', 18, 2)->nullable();
            $table->decimal('actual_sep', 18, 2)->nullable();
            $table->decimal('actual_oct', 18, 2)->nullable();
            $table->decimal('actual_nov', 18, 2)->nullable();
            $table->decimal('actual_dec', 18, 2)->nullable();
            $table->string('kode')->nullable();
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
        Schema::dropIfExists('shcnt_realisasi_anggaran_ai_region_3');
    }
};
