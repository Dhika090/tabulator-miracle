<?php

namespace App\Models\SHU\TargetKinerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class KinerjaKpiStatusAiShu extends Model
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
    protected $table = 'shu_target_kinerja_kinerja_kpi_status_ai';
    protected $fillable = [
        'periode',
        'company',
        'target_penurunan_aset_low_tahunan',
        'target_penurunan_aset_med_tahunan',
        'target_penurunan_aset_low',
        'target_penurunan_aset_med',
        'realisasi_penurunan_low',
        'realisasi_penurunan_med',
        'target',
        'target_kumulatif',
        'real',
        'real_kumulatif',
        'real_kpi',
        'real_kpi_kumulatif',
        'kpi_summary',
    ];
}
