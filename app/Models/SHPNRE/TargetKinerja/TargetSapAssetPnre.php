<?php

namespace App\Models\SHPNRE\TargetKinerja;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class TargetSapAssetPnre extends Model
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

    protected $table = 'shpnre_target_kinerja_target_penurunan_plo';
    protected $fillable = [
        'periode',
        'subholding',
        'company',
        'unit',
        'jumlah_unit_yang_harus_dibenahi',
        'jumlah_unit_yang_sedang_dibenahi',
    ];
}
