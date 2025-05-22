<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ShgSAKARencanaPemeliharaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $now = Carbon::now();
        $data = [];

        for ($i = 0; $i < 31; $i++) {
            $data[] = [
                'id' => Str::uuid(),
                'periode' => null,
                'no' => null,
                'company' => null,
                'lokasi' => null,
                'program_kerja' => null,
                'kategori_maintenance' => null,
                'besar_phasing' => null,
                'remark' => null,
                'jan' => null,
                'feb' => null,
                'mar' => null,
                'apr' => null,
                'may' => null,
                'jun' => null,
                'jul' => null,
                'aug' => null,
                'sep' => null,
                'oct' => null,
                'nov' => null,
                'dec' => null,
                'biaya_kerugian' => null,
                'keterangan_kerugian' => null,
                'penyebab' => null,
                'kendala' => null,
                'tindak_lanjut' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        collect($data)->chunk(25)->each(function ($chunk) {
            DB::table('shg_saka_rencana__pemeliharaan')->insert($chunk->toArray());
        });
    }
}
