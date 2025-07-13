<?php

namespace App\Models\SHCNT\RealisasiAnggaranAi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region4RealisasiAnggaranAi extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    protected $table = 'shcnt_realisasi_anggaran_ai_region_4';

    protected $fillable = [
        'periode',
        'no',
        'program_kerja',
        'kategori_aibt',
        'jenis_anggaran',
        'besar_rkap',
        'entitas',
        'unit',
        'nilai_kontrak',
        'plan_jan',
        'plan_feb',
        'plan_mar',
        'plan_apr',
        'plan_may',
        'plan_jun',
        'plan_jul',
        'plan_aug',
        'plan_sep',
        'plan_oct',
        'plan_nov',
        'plan_dec',
        'prognosa_jan',
        'prognosa_feb',
        'prognosa_mar',
        'prognosa_apr',
        'prognosa_may',
        'prognosa_jun',
        'prognosa_jul',
        'prognosa_aug',
        'prognosa_sep',
        'prognosa_oct',
        'prognosa_nov',
        'prognosa_dec',
        'actual_jan',
        'actual_feb',
        'actual_mar',
        'actual_apr',
        'actual_may',
        'actual_jun',
        'actual_jul',
        'actual_aug',
        'actual_sep',
        'actual_oct',
        'actual_nov',
        'actual_dec',
        'kode',
        'kendala',
        'tindak_lanjut',
    ];
    //
}
