<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ShgTGIAvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $data = [];

        for ($i = 0; $i < 113; $i++) {
            $data[] = [
                'id' => Str::uuid(),

                'periode' => null,
                'company' => null,
                'kategori' => null,
                'target' => null,
                'availability' => null,
                'isu' => null,
                'kendala' => null,
                'tindak_lanjut' => null,

                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        collect($data)->chunk(25)->each(function ($chunk) {
            DB::table('shg_tgi_availability')->insert($chunk->toArray());
        });
    }
}
