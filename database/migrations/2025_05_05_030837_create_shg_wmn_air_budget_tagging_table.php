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
        Schema::create('shg_wmn_air_budget_tagging', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->string('satker')->nullable();
            $table->string('kategori')->nullable();
            $table->string('ce')->nullable();
            $table->string('cost_element_name')->nullable();
            $table->string('program_kerja')->nullable();
            $table->string('total_pagu_usd')->nullable();
            $table->string('jan')->nullable();
            $table->string('feb')->nullable();
            $table->string('mar')->nullable();
            $table->string('apr')->nullable();
            $table->string('may')->nullable();
            $table->string('jun')->nullable();
            $table->string('jul')->nullable();
            $table->string('aug')->nullable();
            $table->string('sep')->nullable();
            $table->string('oct')->nullable();
            $table->string('nov')->nullable();
            $table->string('dec')->nullable();
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
        Schema::dropIfExists('shg_wmn_air_budget_tagging');
    }
};
