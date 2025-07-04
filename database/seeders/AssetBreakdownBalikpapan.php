<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AssetBreakdownBalikpapan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 45; $i++) {
            $data[] = [
                'id' => (string) Str::uuid(),
                'periode' => null,
                'company' => null,
                'plant_segment' => null,
                'kategori_criticality' => null,
                'tag' => null,
                'deskripsi_peralatan' => null,
                'jenis_kerusakan' => null,
                'penyebab' => null,
                'kendala_perbaikan' => null,
                'mitigasi' => null,
                'perbaikan_permanen' => null,
                'progres_perbaikan_permanen' => null,
                'tindak_lanjut' => null,
                'target_penyelesaian' => null,
                'estimasi_biaya_perbaikan' => null,
                'link_foto_video' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Pecah data menjadi batch @25 baris
        $chunks = array_chunk($data, 25);

        foreach ($chunks as $chunk) {
            DB::table('shrnp_balikpapan_asset_breakdown')->insert($chunk);
        }
    }
}
