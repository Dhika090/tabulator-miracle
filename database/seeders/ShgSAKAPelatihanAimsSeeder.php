<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ShgSAKAPelatihanAimsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [];

        for ($i = 0; $i < 17; $i++) {
            $data[] = [
                'id' => Str::uuid(),
                'periode' => null,
                'company' => null,
                'judul_pelatihan' => null,
                'realisasi_perwira' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('shg_saka_pelatihan_aims')->insert($data);
    }
}
