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
        Schema::create('shcnt_rencana_pemeliharaan_region_3', function (Blueprint $table) {
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
            $table->decimal('biaya_kerugian', 20, 2)->nullable();
            $table->text('keterangan_kerugian')->nullable();
            $table->text('penyebab')->nullable();
            $table->text('kendala')->nullable();
            $table->text('tindak_lanjut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shcnt_rencana_pemeliharaan_region_3');
    }
};
