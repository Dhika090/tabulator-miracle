<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatusAssetAiSor3 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 96; $i++) {
            $data[] = [
                'id' => (string) Str::uuid(),
                'periode' => null,
                'subholding' => null,
                'company' => null,
                'unit' => null,
                'asset_group' => null,
                'jumlah' => null,
                'sece_low_breakdown' => null,
                'sece_medium_due_date_inspection' => null,
                'sece_medium_low_condition' => null,
                'sece_medium_low_performance' => null,
                'sece_high' => null,
                'pce_low_breakdown' => null,
                'pce_medium_due_date_inspection' => null,
                'pce_medium_low_condition' => null,
                'pce_medium_low_performance' => null,
                'pce_high' => null,
                'important_low_breakdown' => null,
                'important_medium_due_date_inspection' => null,
                'important_medium_low_condition' => null,
                'important_medium_low_performance' => null,
                'important_high' => null,
                'secondary_low_breakdown' => null,
                'secondary_medium_due_date_inspection' => null,
                'secondary_medium_low_condition' => null,
                'secondary_medium_low_performance' => null,
                'secondary_high' => null,
                'kegiatan_penurunan_low' => null,
                'kegiatan_penurunan_med' => null,
                'penyebab_low_integrity' => null,
                'penambahan_jumlah_aset' => null,
                'naik_turun_low_integrity' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $chunks = array_chunk($data, 25);

        foreach ($chunks as $chunk) {
            DB::table('shg_pgnsor3_status_asset_ai')->insert($chunk);
        }
    }
}
