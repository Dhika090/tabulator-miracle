<?php

namespace App\Models\SHG\TransportasiGas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class StatusAssetAiTGI extends Model
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

    protected $table = 'shg_tgi_status_asset_ai';
    protected $fillable = [
        'periode',
        'subholding',
        'company',
        'unit',
        'asset_group',
        'jumlah',

        'sece_low_breakdown',
        'sece_medium_due_date_inspection',
        'sece_medium_low_condition',
        'sece_medium_low_performance',
        'sece_high',

        'pce_low_breakdown',
        'pce_medium_due_date_inspection',
        'pce_medium_low_condition',
        'pce_medium_low_performance',
        'pce_high',

        'important_low_breakdown',
        'important_medium_due_date_inspection',
        'important_medium_low_condition',
        'important_medium_low_performance',
        'important_high',

        'secondary_low_breakdown',
        'secondary_medium_due_date_inspection',
        'secondary_medium_low_condition',
        'secondary_medium_low_performance',
        'secondary_high',

        'kegiatan_penurunan_low',
        'kegiatan_penurunan_med',
        'penyebab_low_integrity',
        'penambahan_jumlah_aset',
        'naik_turun_low_integrity',
    ];
}
