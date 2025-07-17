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
        Schema::create('mona_iis_general_administrasi_rutin', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('periode')->nullable();
            $table->integer('no')->nullable();
            $table->string('aktifitas')->nullable();
            $table->string('interval')->nullable();
            $table->string('pic')->nullable();

            $table->integer('plan_jan')->nullable();
            $table->integer('target_jan')->nullable();
            $table->integer('actual_jan')->nullable();

            $table->integer('plan_feb')->nullable();
            $table->integer('target_feb')->nullable();
            $table->integer('actual_feb')->nullable();

            $table->integer('plan_mar')->nullable();
            $table->integer('target_mar')->nullable();
            $table->integer('actual_mar')->nullable();

            $table->integer('plan_apr')->nullable();
            $table->integer('target_apr')->nullable();
            $table->integer('actual_apr')->nullable();

            $table->integer('plan_may')->nullable();
            $table->integer('target_may')->nullable();
            $table->integer('actual_may')->nullable();

            $table->integer('plan_jun')->nullable();
            $table->integer('target_jun')->nullable();
            $table->integer('actual_jun')->nullable();

            $table->integer('plan_jul')->nullable();
            $table->integer('target_jul')->nullable();
            $table->integer('actual_jul')->nullable();

            $table->integer('plan_aug')->nullable();
            $table->integer('target_aug')->nullable();
            $table->integer('actual_aug')->nullable();

            $table->integer('plan_sep')->nullable();
            $table->integer('target_sep')->nullable();
            $table->integer('actual_sep')->nullable();

            $table->integer('plan_oct')->nullable();
            $table->integer('target_oct')->nullable();
            $table->integer('actual_oct')->nullable();

            $table->integer('plan_nov')->nullable();
            $table->integer('target_nov')->nullable();
            $table->integer('actual_nov')->nullable();

            $table->integer('plan_dec')->nullable();
            $table->integer('target_dec')->nullable();
            $table->integer('actual_dec')->nullable();

            $table->string('tindak_lanjut', 550)->nullable();
            $table->string('nama_dokumen')->nullable();
            $table->string('nomor_dokumen')->nullable();
            $table->string('link_storage_dokumen', 550)->nullable();
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mona_iis_general_administrasi_rutin');
    }
};
