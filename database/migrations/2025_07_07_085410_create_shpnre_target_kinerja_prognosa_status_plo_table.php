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
        Schema::create('shpnre_target_kinerja_prognosa_status_plo', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('company')->nullable();
            $table->integer('uncertified')->default(0)->nullable();
            $table->integer('exp')->default(0)->nullable();
            $table->integer('exp_lt6')->default(0)->nullable();
            $table->integer('valid')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shpnre_target_kinerja_prognosa_status_plo');
    }
};
