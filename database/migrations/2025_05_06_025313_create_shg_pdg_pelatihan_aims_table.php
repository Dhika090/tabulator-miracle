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
        Schema::create('shg_pdg_pelatihan_aims', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->string('company')->nullable();
            $table->string('judul_pelatihan')->nullable();
            $table->integer('realisasi_perwira')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_pdg_pelatihan_aims');
    }
};
