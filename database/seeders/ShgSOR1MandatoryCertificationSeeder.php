<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ShgSOR1MandatoryCertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [];

        for ($i = 0; $i < 109; $i++) {
            $data[] = [
                'id' => Str::uuid(),
                'periode' => null,
                'subholding' => null,
                'company' => null,
                'unit' => null,
                'nama_sertifikasi' => null,
                'lembaga_penerbit_sertifikat' => null,
                'jumlah_sertifikasi_terbit' => null,
                'jumlah_learning_hours' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('shg_pgnsor2_mandatory_certification')->insert($data);
    }
}
