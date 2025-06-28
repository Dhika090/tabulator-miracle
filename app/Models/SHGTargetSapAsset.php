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
        'subholding',
        'company',
        'unit',
        'jumlah_unit_yang_harus_dibenahi',
        'jumlah_unit_yang_sedang_dibenahi',
    ];
}
