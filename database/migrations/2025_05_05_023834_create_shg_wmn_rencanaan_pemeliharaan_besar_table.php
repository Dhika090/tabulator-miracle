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
        Schema::create('shg_wmn_rencanaan_pemeliharaan_besar', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->integer('no')->nullable();
            $table->string('company')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('program_kerja')->nullable();
            $table->string('kategori_maintenance')->nullable();
            $table->string('besar_phasing')->nullable();
            $table->string('remark')->nullable();
            $table->integer('jan')->nullable();
            $table->integer('feb')->nullable();
            $table->integer('mar')->nullable();
            $table->integer('apr')->nullable();
            $table->integer('may')->nullable();
            $table->integer('jun')->nullable();
            $table->integer('jul')->nullable();
            $table->integer('aug')->nullable();
            $table->integer('sep')->nullable();
            $table->integer('oct')->nullable();
            $table->integer('nov')->nullable();
            $table->integer('dec')->nullable();
            $table->string('biaya_kerugian')->nullable();
            $table->string('keterangan_kerugian')->nullable();
            $table->string('penyebab')->nullable();
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
        Schema::dropIfExists('shg_wmn_rencanaan_pemeliharaan_besar');
    }
};
