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
        Schema::create('shg_mandatory_certification', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->string('subholding');
            $table->string('company');
            $table->string('unit');

            $table->integer('posisi_awal_tahun');
            $table->integer('posisi_vacant_awal_tahun');
            $table->integer('posisi_terisi_awal_tahun');
            $table->integer('target_personil_memenuhi_sertifikasi');
            $table->integer('jumlah_sertifikasi_sudah_terbit');
            $table->integer('jumlah_sertifikasi_belum_terbit');
            $table->integer('jumlah_learning_hours');
            $table->integer('target_kpi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_mandatory_certification');
    }
};
