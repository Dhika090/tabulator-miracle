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
        Schema::create('shrnp_ruu_dumai_sistem_informasi_aims', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->string('company')->nullable();
            $table->string('jumlah_aset_operasi')->nullable();
            $table->string('jumlah_aset_teregister')->nullable();
            $table->string('kendala_aset_register')->nullable();
            $table->string('tindak_lanjut_aset_register')->nullable();
            $table->string('sistem_informasi_aim')->nullable();
            $table->string('total_wo_comply')->nullable();
            $table->string('total_wo_completed')->nullable();
            $table->string('total_wo_in_progress')->nullable();
            $table->string('total_wo_backlog')->nullable();
            $table->string('kendala')->nullable();
            $table->string('tindak_lanjut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shrnp_ruu_dumai_sistem_informasi_aims');
    }
};
