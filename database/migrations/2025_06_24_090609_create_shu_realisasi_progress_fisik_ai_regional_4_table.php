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
        Schema::create('shu_realisasi_progress_fisik_ai_regional_4', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('no')->nullable();
            $table->string('program_kerja')->nullable();
            $table->string('kategori_aibt')->nullable();
            $table->string('jenis_anggaran')->nullable();
            $table->string('besar_rkap')->nullable();
            $table->string('entitas')->nullable();
            $table->string('unit')->nullable();
            $table->decimal('nilai_kontrak', 16, 2)->nullable();
            $table->decimal('plan_jan', 16, 2)->nullable();
            $table->decimal('plan_feb', 16, 2)->nullable();
            $table->decimal('plan_mar', 16, 2)->nullable();
            $table->decimal('plan_apr', 16, 2)->nullable();
            $table->decimal('plan_may', 16, 2)->nullable();
            $table->decimal('plan_jun', 16, 2)->nullable();
            $table->decimal('plan_jul', 16, 2)->nullable();
            $table->decimal('plan_aug', 16, 2)->nullable();
            $table->decimal('plan_sep', 16, 2)->nullable();
            $table->decimal('plan_oct', 16, 2)->nullable();
            $table->decimal('plan_nov', 16, 2)->nullable();
            $table->decimal('plan_dec', 16, 2)->nullable();
            $table->decimal('actual_jan', 16, 2)->nullable();
            $table->decimal('actual_feb', 16, 2)->nullable();
            $table->decimal('actual_mar', 16, 2)->nullable();
            $table->decimal('actual_apr', 16, 2)->nullable();
            $table->decimal('actual_may', 16, 2)->nullable();
            $table->decimal('actual_jun', 16, 2)->nullable();
            $table->decimal('actual_jul', 16, 2)->nullable();
            $table->decimal('actual_aug', 16, 2)->nullable();
            $table->decimal('actual_sep', 16, 2)->nullable();
            $table->decimal('actual_oct', 16, 2)->nullable();
            $table->decimal('actual_nov', 16, 2)->nullable();
            $table->decimal('actual_dec', 16, 2)->nullable();
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
        Schema::dropIfExists('shu_realisasi_progress_fisik_ai_regional_4');
    }
};
