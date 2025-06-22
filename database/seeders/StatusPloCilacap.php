<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatusPloCilacap extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 61; $i++) {
            $data[] = [
                'id' => (string) Str::uuid(),
                'periode' => null,
                'nomor_plo' => null,
                'company' => null,
                'area' => null,
                'lokasi' => null,
                'nama_aset' => null,
                'tanggal_pengesahan' => null,
                'masa_berlaku' => null,
                'keterangan' => null,
                'belum_proses' => null,
                'pre_inspection' => null,
                'inspection' => null,
                'coi_peralatan' => null,
                'ba_pk' => null,
                'penerbitan_plo_valid' => null,
                'kendala' => null,
                'tindak_lanjut' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('shrnp_cilacap_status_plo')->insert($data);
    }
}
