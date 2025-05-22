<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SapAssetPTGSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        
        $now = Carbon::now();
        $data = [];

        for ($i = 0; $i < 132; $i++) {
            $data[] = [
                'id' => Str::uuid(),
                'periode' => null,
                'subholding' => null,
                'company' => null,
                'unit' => null,
                'nama_stasiun' => null,
                'belum_mulai' => null,
                'kickoff_meeting' => null,
                'identifikasi_peralatan' => null,
                'survey_lapangan' => null,
                'pembenahan_funloc' => null,
                'review_criticality' => null,
                'penyelarasan_dokumen' => null,
                'melengkapi_tag_fisik' => null,
                'form_upload_data' => null,
                'request_master_data' => null,
                'update_master_data' => null,
                'kendala' => null,
                'tindak_lanjut' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data per 25 rows (to avoid SQL Server's 2100 parameter limit)
        collect($data)->chunk(25)->each(function ($chunk) {
            DB::table('shg_pertamina_sap_asset_ptg')->insert($chunk->toArray());
        });
    }
}
