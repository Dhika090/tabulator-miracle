<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ShgPLIRealisasiProgresFisikAiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [];

        for ($i = 0; $i < 25; $i++) {
            $data[] = [
                'id' => Str::uuid(),
                'periode' => null,
                'no' => null,
                'program_kerja' => null,
                'kategori_aibt' => null,
                'jenis_anggaran' => null,
                'besar_rkap' => null,
                'entitas' => null,
                'unit' => null,
                'nilai_kontrak' => null,
                'plan_jan' => null,
                'plan_feb' => null,
                'plan_mar' => null,
                'plan_apr' => null,
                'plan_may' => null,
                'plan_jun' => null,
                'plan_jul' => null,
                'plan_aug' => null,
                'plan_sep' => null,
                'plan_oct' => null,
                'plan_nov' => null,
                'plan_dec' => null,
                'actual_jan' => null,
                'actual_feb' => null,
                'actual_mar' => null,
                'actual_apr' => null,
                'actual_may' => null,
                'actual_jun' => null,
                'actual_jul' => null,
                'actual_aug' => null,
                'actual_sep' => null,
                'actual_oct' => null,
                'actual_nov' => null,
                'actual_dec' => null,
                'kode' => null,
                'kendala' => null,
                'tindak_lanjut' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('shg_pgnlngindonesia_realisasi_progress_fisik_ai_pli')->insert($data);
    }
}
