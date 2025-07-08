<?php

namespace App\Models\SHG\TargetKinerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KinerjaKpiPemnhnPloShg extends Model
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
    protected $table = 'shg_kinerja_kpi_pemnhn_plo';
    protected $fillable = [
        'periode',
        'company',
        'target_pemenuhan_plo_expired_tahunan',
        'target_pemenuhan_plo_uncertified_tahunan',
        'target_penurunan_plo_expired',
        'target_penurunan_plo_uncertified',
        'realisasi_plo_expired',
        'realisasi_plo_uncertified',
        'target',
        'target_kumulatif',
        'real',
        'real_kumulatif',
        'real_kpi',
        'real_kpi_kumulatif',
        'kpi_summary',
    ];
}
