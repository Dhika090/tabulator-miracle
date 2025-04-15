<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SHGTargetStatusAssetIntgrity extends Model
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

    protected $table = 'shg_target_status_asset_integrity';

    protected $fillable = [
        'periode',
        'company',
        'asset_group',
        'green_integrity',
        'yellow_integrity',
        'red_integrity',
        'information',
    ];
}
