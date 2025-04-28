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
        Schema::create('shg_kalimantan_realisasi_progress_fisik_ai_2025', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->string('no')->nullable();
            $table->string('program_kerja')->nullable();
            $table->string('kategori_aibt')->nullable();
            $table->string('jenis_anggaran')->nullable();
            $table->string('besar_rkap')->nullable();
            $table->string('entitas')->nullable();
            $table->string('unit')->nullable();
            $table->string('nilai_kontrak')->nullable();
            $table->decimal('plan_jan', 15, 2)->nullable();
            $table->decimal('plan_feb', 15, 2)->nullable();
            $table->decimal('plan_mar', 15, 2)->nullable();
            $table->decimal('plan_apr', 15, 2)->nullable();
            $table->decimal('plan_may', 15, 2)->nullable();
            $table->decimal('plan_jun', 15, 2)->nullable();
            $table->decimal('plan_jul', 15, 2)->nullable();
            $table->decimal('plan_aug', 15, 2)->nullable();
            $table->decimal('plan_sep', 15, 2)->nullable();
            $table->decimal('plan_oct', 15, 2)->nullable();
            $table->decimal('plan_nov', 15, 2)->nullable();
            $table->decimal('plan_dec', 15, 2)->nullable();
            $table->decimal('actual_jan', 15, 2)->nullable();
            $table->decimal('actual_feb', 15, 2)->nullable();
            $table->decimal('actual_mar', 15, 2)->nullable();
            $table->decimal('actual_apr', 15, 2)->nullable();
            $table->decimal('actual_may', 15, 2)->nullable();
            $table->decimal('actual_jun', 15, 2)->nullable();
            $table->decimal('actual_jul', 15, 2)->nullable();
            $table->decimal('actual_aug', 15, 2)->nullable();
            $table->decimal('actual_sep', 15, 2)->nullable();
            $table->decimal('actual_oct', 15, 2)->nullable();
            $table->decimal('actual_nov', 15, 2)->nullable();
            $table->decimal('actual_dec', 15, 2)->nullable();
            $table->string('kode')->nullable();
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
        Schema::dropIfExists('shg_kalimantan_realisasi_progress_fisik_ai_2025');
    }
};
