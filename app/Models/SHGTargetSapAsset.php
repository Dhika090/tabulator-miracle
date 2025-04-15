<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SHGTargetSapAsset extends Model
{
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
    protected $table = 'shg_target_sap_asset';
    protected $fillable = [
        'periode',
        'company',
        'subholding',
        'unit',
        'jumlah_unit_harus_di_benahi',
        'jumlah_unit_sedang_di_benahi',
    ];
}
