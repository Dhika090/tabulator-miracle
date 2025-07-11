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
        Schema::create('shcnt_kondisi_vacant_aims_region_7', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('company')->nullable();
            $table->integer('total_personil_asset_integrity')->nullable();
            $table->integer('jumlah_personil_vacant')->nullable();
            $table->integer('jumlah_personil_pensiun')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shcnt_kondisi_vacant_aims_region_7');
    }
};
