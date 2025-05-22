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
        Schema::create('shg_pgn_lng_indonesia', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('subholding')->nullable();
            $table->string('company')->nullable();
            $table->string('unit')->nullable();
            $table->string('asset_group')->nullable();
            $table->decimal('jumlah', 15, 2)->nullable();

            // SECE
            $table->decimal('sece_low_integrity_breakdown', 3, 2)->nullable();
            $table->decimal('sece_medium_due_date_inspection', 3, 2)->nullable();
            $table->decimal('sece_medium_low_condition', 3, 2)->nullable();
            $table->decimal('sece_medium_low_performance', 3, 2)->nullable();
            $table->decimal('sece_high_integrity', 3, 2)->nullable();

            // PCE
            $table->decimal('pce_low_integrity_breakdown', 3, 2)->nullable();
            $table->decimal('pce_medium_due_date_inspection', 3, 2)->nullable();
            $table->decimal('pce_medium_low_condition', 3, 2)->nullable();
            $table->decimal('pce_medium_low_performance', 3, 2)->nullable();
            $table->decimal('pce_high_integrity', 3, 2)->nullable();

            // IMPORTANT
            $table->decimal('important_low_integrity_breakdown', 3, 2)->nullable();
            $table->decimal('important_medium_due_date_inspection', 3, 2)->nullable();
            $table->decimal('important_medium_low_condition', 3, 2)->nullable();
            $table->decimal('important_medium_low_performance', 3, 2)->nullable();
            $table->decimal('important_high_integrity', 3, 2)->nullable();

            // SECONDARY
            $table->decimal('secondary_low_integrity_breakdown', 3, 2)->nullable();
            $table->decimal('secondary_medium_due_date_inspection', 3, 2)->nullable();
            $table->decimal('secondary_medium_low_condition', 3, 2)->nullable();
            $table->decimal('secondary_medium_low_performance', 3, 2)->nullable();
            $table->decimal('secondary_high_integrity', 3, 2)->nullable();

            // Informasi lainnya
            $table->text('kegiatan_penurunan_low')->nullable();
            $table->text('kegiatan_penurunan_med')->nullable();
            $table->text('informasi_penyebab_low_integrity')->nullable();
            $table->text('informasi_penambahan_jumlah_aset')->nullable();
            $table->text('informasi_naik_turun_low_integrity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_pgn_lng_indonesia');
    }
};
