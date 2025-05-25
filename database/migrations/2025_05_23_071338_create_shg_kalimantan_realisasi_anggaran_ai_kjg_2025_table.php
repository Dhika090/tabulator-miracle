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
        Schema::create('shg_kalimantan_realisasi_anggaran_ai_kjg_2025', function (Blueprint $table) {
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
            $table->string('plan_jan')->nullable();
            $table->string('plan_feb')->nullable();
            $table->string('plan_mar')->nullable();
            $table->string('plan_apr')->nullable();
            $table->string('plan_may')->nullable();
            $table->string('plan_jun')->nullable();
            $table->string('plan_jul')->nullable();
            $table->string('plan_aug')->nullable();
            $table->string('plan_sep')->nullable();
            $table->string('plan_oct')->nullable();
            $table->string('plan_nov')->nullable();
            $table->string('plan_dec')->nullable();
            $table->string('prognosa_jan')->nullable();
            $table->string('prognosa_feb')->nullable();
            $table->string('prognosa_mar')->nullable();
            $table->string('prognosa_apr')->nullable();
            $table->string('prognosa_may')->nullable();
            $table->string('prognosa_jun')->nullable();
            $table->string('prognosa_jul')->nullable();
            $table->string('prognosa_aug')->nullable();
            $table->string('prognosa_sep')->nullable();
            $table->string('prognosa_oct')->nullable();
            $table->string('prognosa_nov')->nullable();
            $table->string('prognosa_dec')->nullable();
            $table->string('actual_jan')->nullable();
            $table->string('actual_feb')->nullable();
            $table->string('actual_mar')->nullable();
            $table->string('actual_apr')->nullable();
            $table->string('actual_may')->nullable();
            $table->string('actual_jun')->nullable();
            $table->string('actual_jul')->nullable();
            $table->string('actual_aug')->nullable();
            $table->string('actual_sep')->nullable();
            $table->string('actual_oct')->nullable();
            $table->string('actual_nov')->nullable();
            $table->string('actual_dec')->nullable();
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
        Schema::dropIfExists('shg_kalimantan_realisasi_anggaran_ai_kjg_2025');
    }
};
