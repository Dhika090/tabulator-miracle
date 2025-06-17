<?php

namespace App\Models\SHIML\Pis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class RealAnggaranFigurePis extends Model
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

    protected $table = 'shiml_pis_real_anggaran_figure';

    protected $fillable = [
        'periode',
        'no',
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
        'plan_mei',
        'plan_jun',
        'plan_jul',
        'plan_agu',
        'plan_sep',
        'plan_okt',
        'plan_nov',
        'plan_des',
        'prognosa_jan',
        'prognosa_feb',
        'prognosa_mar',
        'prognosa_apr',
        'prognosa_mei',
        'prognosa_jun',
        'prognosa_jul',
        'prognosa_agu',
        'prognosa_sep',
        'prognosa_okt',
        'prognosa_nov',
        'prognosa_des',
        'actual_jan',
        'actual_feb',
        'actual_mar',
        'actual_apr',
        'actual_mei',
        'actual_jun',
        'actual_jul',
        'actual_agu',
        'actual_sep',
        'actual_okt',
        'actual_nov',
        'actual_des',
        'kode',
        'kendala',
        'tindak_lanjut',
    ];
}
