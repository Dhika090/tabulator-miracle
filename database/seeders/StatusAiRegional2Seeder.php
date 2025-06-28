<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class StatusAiRegional2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 39; $i++) {
            $data[] = [
                'id' => (string) Str::uuid(),
                'periode' => null,
                'subholding' => null,
                'company' => null,
                'unit' => null,
                'asset_group' => null,
                'jumlah' => null,
                'sece_low_integrity_breakdown' => null,
                'sece_medium_integrity_due_date_inspection' => null,
                'sece_medium_integrity_low_condition' => null,
                'sece_medium_integrity_low_performance' => null,
                'sece_high_integrity' => null,
                'pce_low_integrity_breakdown' => null,
                'pce_medium_integrity_due_date_inspection' => null,
                'pce_medium_integrity_low_condition' => null,
                'pce_medium_integrity_low_performance' => null,
                'pce_high_integrity' => null,
                'important_low_integrity_breakdown' => null,
                'important_medium_integrity_due_date_inspection' => null,
                'important_medium_integrity_low_condition' => null,
                'important_medium_integrity_low_performance' => null,
                'important_high_integrity' => null,
                'secondary_low_integrity_breakdown' => null,
                'secondary_medium_integrity_due_date_inspection' => null,
                'secondary_medium_integrity_low_condition' => null,
                'secondary_medium_integrity_low_performance' => null,
                'secondary_high_integrity' => null,
                'kegiatan_penurunan_low' => null,
                'kegiatan_penurunan_med' => null,
                'tanggal_realisasi' => null,
                'tanggal_prognosa' => null,
                'informasi_penyebab_low_integrity' => null,
                'informasi_penambahan_jumlah_aset' => null,
                'informasi_naik_turun_low_integrity' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('shu_status_ai_regional_2')->insert($data);
    }
}
