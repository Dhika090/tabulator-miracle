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
        Schema::create('shg_kinerja_target_status_asset', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->string('company');
            $table->string('asset_group');
            $table->integer('green_integrity')->nullable();
            $table->integer('yellow_integrity')->nullable();
            $table->integer('red_integrity')->nullable();
            $table->integer('low_sece')->nullable();
            $table->integer('low_pce')->nullable();
            $table->integer('low_important')->nullable();
            $table->text('information')->nullable();
            $table->timestamps();
        });
    }
    


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_kinerja_target_status_asset');
    }
};
