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
        Schema::create('shu_kondisi_vacant_regional_4', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('company')->nullable();
            $table->integer('total_personil_asset_integrity')->nullable();
            $table->integer('jumlah_personil_vacant')->nullable();
            $table->integer('jumlah_personil_pensiun')->nullable();
            $table->string('keterangan', 550)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shu_kondisi_vacant_regional_4');
    }
};
