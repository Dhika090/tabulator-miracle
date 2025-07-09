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
        Schema::create('shcnt_availability_region_8', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('company')->nullable();
            $table->string('kategori')->nullable();
            $table->decimal('target', 8, 2)->nullable();
            $table->decimal('availability', 8, 2)->nullable();
            $table->string('isu')->nullable();
            $table->string('kendala', 600)->nullable();
            $table->string('tindak_lanjut', 600)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shcnt_availability_region_8');
    }
};
