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
        Schema::create('shg_pertamina_air_budget_tagging_ptg', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->string('satker');
            $table->string('kategori');
            $table->string('ce')->nullable();
            $table->string('cost_element_name')->nullable();
            $table->string('program_kerja');
            $table->decimal('total_pagu_usd', 15, 2);
            $table->decimal('jan', 15, 2)->nullable();
            $table->decimal('feb', 15, 2)->nullable();
            $table->decimal('mar', 15, 2)->nullable();
            $table->decimal('apr', 15, 2)->nullable();
            $table->decimal('may', 15, 2)->nullable();
            $table->decimal('jun', 15, 2)->nullable();
            $table->decimal('jul', 15, 2)->nullable();
            $table->decimal('aug', 15, 2)->nullable();
            $table->decimal('sep', 15, 2)->nullable();
            $table->decimal('oct', 15, 2)->nullable();
            $table->decimal('nov', 15, 2)->nullable();
            $table->decimal('dec', 15, 2)->nullable();
            $table->enum('aset_integrity', ['Yes', 'No']);
            $table->string('airtagging')->nullable();
            $table->string('prioritas')->nullable();
            $table->string('status_integrity')->nullable();
            $table->integer('jumlah_aset_critical_sece')->nullable();
            $table->integer('jumlah_aset_critical_pce')->nullable();
            $table->integer('jumlah_aset_important')->nullable();
            $table->integer('jumlah_aset_secondary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_pertamina_air_budget_tagging_ptg');
    }
};
