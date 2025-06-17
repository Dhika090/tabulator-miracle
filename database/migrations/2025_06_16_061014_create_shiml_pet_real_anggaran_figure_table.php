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
        Schema::create('shiml_pet_real_anggaran_figure', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->integer('no')->nullable();
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
            $table->string('plan_mei')->nullable();
            $table->string('plan_jun')->nullable();
            $table->string('plan_jul')->nullable();
            $table->string('plan_agu')->nullable();
            $table->string('plan_sep')->nullable();
            $table->string('plan_okt')->nullable();
            $table->string('plan_nov')->nullable();
            $table->string('plan_des')->nullable();
            $table->string('prognosa_jan')->nullable();
            $table->string('prognosa_feb')->nullable();
            $table->string('prognosa_mar')->nullable();
            $table->string('prognosa_apr')->nullable();
            $table->string('prognosa_mei')->nullable();
            $table->string('prognosa_jun')->nullable();
            $table->string('prognosa_jul')->nullable();
            $table->string('prognosa_agu')->nullable();
            $table->string('prognosa_sep')->nullable();
            $table->string('prognosa_okt')->nullable();
            $table->string('prognosa_nov')->nullable();
            $table->string('prognosa_des')->nullable();
            $table->string('actual_jan')->nullable();
            $table->string('actual_feb')->nullable();
            $table->string('actual_mar')->nullable();
            $table->string('actual_apr')->nullable();
            $table->string('actual_mei')->nullable();
            $table->string('actual_jun')->nullable();
            $table->string('actual_jul')->nullable();
            $table->string('actual_agu')->nullable();
            $table->string('actual_sep')->nullable();
            $table->string('actual_okt')->nullable();
            $table->string('actual_nov')->nullable();
            $table->string('actual_des')->nullable();
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
        Schema::dropIfExists('shiml_pet_real_anggaran_figure');
    }
};
