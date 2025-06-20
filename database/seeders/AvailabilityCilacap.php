<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AvailabilityCilacap extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 40; $i++) {
            $data[] = [
                'id' => (string) Str::uuid(),
                'periode' => null,
                'company' => null,
                'kategori' => null,
                'target' => null,
                'availability' => null,
                'isu' => null,
                'kendala' => null,
                'tindak_lanjut' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('shrnp_cilacap_availability')->insert($data);
    }
}
