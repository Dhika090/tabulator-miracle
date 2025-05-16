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
        Schema::create('shg_pgnsor1_reliability', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('company')->nullable();
            $table->string('kategori')->nullable();
            $table->decimal('target', 8, 2)->nullable();
            $table->decimal('reliability', 8, 3)->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_pgnsor1_reliability');
    }
};
