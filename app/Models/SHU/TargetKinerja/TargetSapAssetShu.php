<?php

namespace App\Models\SHU\TargetKinerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TargetSapAssetShu extends Model
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
    protected $table = 'shu_target_sap_asset_shu';
    protected $fillable = [
        'periode',
        'subholding',
        'company',
        'unit',
        'jumlah_unit_yang_harus_dibenahi',
        'jumlah_unit_yang_sedang_dibenahi',
    ];
}
