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
        Schema::create('shg_target_kinerja_prognosa_status_ai', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('company')->nullable();
            $table->integer('low_sece')->nullable();
            $table->integer('low_pce')->nullable();
            $table->integer('low_important')->nullable();
            $table->integer('med_sece')->nullable();
            $table->integer('med_pce')->nullable();
            $table->integer('med_important')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('high')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_target_kinerja_prognosa_status_ai');
    }
};
