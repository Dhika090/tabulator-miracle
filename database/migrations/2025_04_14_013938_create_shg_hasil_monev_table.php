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
        Schema::create('shg_hasil_monev', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode');
            $table->integer('no');
            $table->string('bahasan');
            $table->string('rtl');
            $table->string('progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shg_hasil_monev');
    }
};
