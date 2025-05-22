<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ShgPertaminaStatusAssetAiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $data = [];

        for ($i = 0; $i < 75; $i++) {
            $data[] = [
                'id' => Str::uuid(),
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

                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // Insert data per 25 rows (to avoid SQL Server's 2100 parameter limit)
        collect($data)->chunk(25)->each(function ($chunk) {
            DB::table('shg_pertamina_status_asset_ai')->insert($chunk->toArray());
        });
    }
}
