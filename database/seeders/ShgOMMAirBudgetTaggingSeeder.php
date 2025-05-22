<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ShgOMMAirBudgetTaggingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $data = [];

        for ($i = 0; $i < 35; $i++) {
            $data[] = [
                'id' => Str::uuid(),

                'periode' => null,
                'satker' => null,
                'kategori' => null,
                'ce' => null,
                'cost_element_name' => null,
                'program_kerja' => null,
                'total_pagu_usd' => null,
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
                'aset_integrity' => null,
                'airtagging' => null,
                'prioritas' => null,
                'status_integrity' => null,
                'jumlah_aset_critical_sece' => null,
                'jumlah_aset_critical_pce' => null,
                'jumlah_aset_important' => null,
                'jumlah_aset_secondary' => null,

                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        collect($data)->chunk(25)->each(function ($chunk) {
            DB::table('shg_omm_air_budget_tagging')->insert($chunk->toArray());
        });
    }
}
