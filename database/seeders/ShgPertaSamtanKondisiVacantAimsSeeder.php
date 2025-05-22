<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ShgPertaSamtanKondisiVacantAimsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $data = [];

        for ($i = 0; $i < 25; $i++) {
            $data[] = [
                'id' => Str::uuid(),

                'periode' => null,
                'company' => null,
                'total_personil_asset_integrity' => null,
                'jumlah_personil_vacant' => null,
                'jumlah_personil_pensiun' => null,
                'keterangan' => null,

                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        collect($data)->chunk(25)->each(function ($chunk) {
            DB::table('shg_pertasamtan_kondisi_vacant_aims_ptsg')->insert($chunk->toArray());
        });
    }
}
