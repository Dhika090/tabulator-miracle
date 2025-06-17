<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SapAssetPtkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 85; $i++) {
            $data[] = [
                'id' => $i,
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
                'penyelarasan_dokumen_dan_lapangan' => null,
                'melengkapi_tag_fisik' => null,
                'mempersiapkan_form_upload_data' => null,
                'request_ke_master_data' => null,
                'update_di_master_data' => null,
                'kendala' => null,
                'tindak_lanjut' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('shiml_ptk_sap_asset')->insert($data);
    }
}
