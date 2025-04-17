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
        Schema::create('shg_kinerja_target_2025_ai', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->string('company');
            $table->integer('penurunan_kumulatif_low_integrity')->nullable();
            $table->integer('penurunan_kumulatif_medium_integrity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_kinerja_target_2025_ai');
    }
};
