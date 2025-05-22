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
        Schema::create('shg_saka_realisasi_anggaran_ai', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->year('periode')->nullable();
            $table->integer('no')->nullable();
            $table->string('program_kerja')->nullable();
            $table->string('kategori_aibt')->nullable();
            $table->string('jenis_anggaran')->nullable();
            $table->string('besar_rkap')->nullable();
            $table->string('entitas')->nullable();
            $table->string('unit')->nullable();
            $table->string('nilai_kontrak')->nullable();

            // Kolom Plan Bulanan
            foreach (['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'] as $month) {
                $table->string("plan_$month")->nullable();
            }

            // Kolom Prognosa Bulanan
            foreach (['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'] as $month) {
                $table->string("prognosa_$month")->nullable();
            }

            // Kolom Actual Bulanan
            foreach (['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'] as $month) {
                $table->string("actual_$month")->nullable();
            }

            $table->string('kode')->nullable();
            $table->string('kendala', 350)->nullable();
            $table->string('tindak_lanjut', 350)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_saka_realisasi_anggaran_ai');
    }
};
