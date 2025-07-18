<?php

namespace App\Models\SHU\StatusAi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Regional3StatusAi extends Model
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

    protected $table = 'shu_status_ai_regional_3';

    protected $fillable = [
        'periode',
        'subholding',
        'company',
        'unit',
        'asset_group',
        'jumlah',
        'sece_low_integrity_breakdown',
        'sece_medium_integrity_due_date_inspection',
        'sece_medium_integrity_low_condition',
        'sece_medium_integrity_low_performance',
        'sece_high_integrity',
        'pce_low_integrity_breakdown',
        'pce_medium_integrity_due_date_inspection',
        'pce_medium_integrity_low_condition',
        'pce_medium_integrity_low_performance',
        'pce_high_integrity',
        'important_low_integrity_breakdown',
        'important_medium_integrity_due_date_inspection',
        'important_medium_integrity_low_condition',
        'important_medium_integrity_low_performance',
        'important_high_integrity',
        'secondary_low_integrity_breakdown',
        'secondary_medium_integrity_due_date_inspection',
        'secondary_medium_integrity_low_condition',
        'secondary_medium_integrity_low_performance',
        'secondary_high_integrity',
        'kegiatan_penurunan_low',
        'kegiatan_penurunan_med',
        'tanggal_realisasi',
        'tanggal_prognosa',
        'informasi_penyebab_low_integrity',
        'informasi_penambahan_jumlah_aset',
        'informasi_naik_turun_low_integrity',
    ];
}
