<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ShgGEISistemInformasiAimsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
      public function run()
    {
        $data = [];
        $now = Carbon::now();

        for ($i = 0; $i < 17; $i++) {
            $data[] = [
                'id' => (string) Str::uuid(),
                'periode' => null,
                'company' => null,
                'jumlah_aset_operasi' => null,
                'jumlah_aset_teregister' => null,
                'kendala_aset_register' => null,
                'tindak_lanjut_aset_register' => null,
                'sistem_informasi_aim' => null,
                'total_wo_comply' => null,
                'total_wo_completed' => null,
                'total_wo_in_progress' => null,
                'total_wo_backlog' => null,
                'kendala' => null,
                'tindak_lanjut' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        collect($data)->chunk(25)->each(function ($chunk) {
            DB::table('shg_gei_sistem_informasi_aims')->insert($chunk->toArray());
        });
    }
}
