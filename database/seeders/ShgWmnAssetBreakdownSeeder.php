<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ShgWmnAssetBreakdownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $data = [];

        for ($i = 0; $i < 8; $i++) {
            $data[] = [
                'id' => Str::uuid(),
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

                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        collect($data)->chunk(25)->each(function ($chunk) {
            DB::table('shg_wmn_asset_breakdown')->insert($chunk->toArray());
        });
    }
}
