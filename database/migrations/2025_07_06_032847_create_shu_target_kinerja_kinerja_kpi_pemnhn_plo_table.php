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
        Schema::create('shu_target_kinerja_kinerja_kpi_pemnhn_plo', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('company')->nullable();
            $table->integer('target_pemenuhan_plo_expired_tahunan')->nullable();
            $table->integer('target_pemenuhan_plo_uncertified_tahunan')->nullable();
            $table->integer('target_penurunan_plo_expired')->nullable();
            $table->integer('target_penurunan_plo_uncertified')->nullable();
            $table->integer('realisasi_plo_expired')->nullable();
            $table->integer('realisasi_plo_uncertified')->nullable();
            $table->decimal('target', 10, 2)->nullable();
            $table->decimal('target_kumulatif', 10, 2)->nullable();
            $table->decimal('real', 10, 2)->nullable();
            $table->decimal('real_kumulatif', 10, 2)->nullable();
            $table->decimal('real_kpi', 10, 2)->nullable();
            $table->decimal('real_kpi_kumulatif', 10, 2)->nullable();
            $table->decimal('kpi_summary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shu_target_kinerja_kinerja_kpi_pemnhn_plo');
    }
};
