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
        Schema::create('mona_iis_apk_non_rutin', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('aktifitas')->nullable();
            $table->date('tanggal_Mulai')->nullable();
            $table->date('target_penyelesaian')->nullable();
            $table->date('realisasi_penyelesaian')->nullable();
            $table->string('status')->nullable();
            $table->string('pic')->nullable();
            $table->string('tindak_lanjut', 550)->nullable();
            $table->string('nama_dokumen')->nullable();
            $table->string('nomor_dokumen')->nullable();
            $table->string('link_storage_dokumen')->nullable();
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mona_iis_apk_non_rutin');
    }
};
