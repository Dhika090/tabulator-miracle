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
        Schema::create('shpnre_kinerja_kpi_status_ai', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('company')->nullable();
            $table->integer('target_penurunan_aset_low_tahunan')->nullable();
            $table->integer('target_penurunan_aset_med_tahunan')->nullable();
            $table->integer('target_penurunan_aset_low')->nullable();
            $table->integer('target_penurunan_aset_med')->nullable();
            $table->integer('realisasi_penurunan_low')->nullable();
            $table->integer('realisasi_penurunan_med')->nullable();
            $table->decimal('target', 16, 2)->nullable();
            $table->decimal('target_kumulatif', 16, 2)->nullable();
            $table->decimal('real', 16, 2)->nullable();
            $table->decimal('real_kumulatif', 16, 2)->nullable();
            $table->decimal('real_kpi', 16, 2)->nullable();
            $table->decimal('real_kpi_kumulatif', 16, 2)->nullable();
            $table->decimal('kpi_summary', 16, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shpnre_kinerja_kpi_status_ai');
    }
};
