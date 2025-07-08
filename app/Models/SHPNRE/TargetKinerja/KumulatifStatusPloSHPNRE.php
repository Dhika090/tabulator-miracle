<?php

namespace App\Models\SHPNRE\TargetKinerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class KumulatifStatusPloSHPNRE extends Model
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

    protected $table = 'shpnre_target_kinerja_kumulatif_status_plo';
    protected $fillable = [
        'periode',
        'subholding',
        'company',
        'unit',
        'plo_expired',
        'plo_uncertified',
    ];
}
