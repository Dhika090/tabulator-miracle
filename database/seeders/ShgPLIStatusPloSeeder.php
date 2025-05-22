<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ShgPLIStatusPloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [];
        $now = Carbon::now();

        for ($i = 0; $i < 51; $i++) {
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
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        collect($data)->chunk(25)->each(function ($chunk) {
            DB::table('shg_pgnlngindonesia_status_plo_pli')->insert($chunk->toArray());
        });
    }
}
