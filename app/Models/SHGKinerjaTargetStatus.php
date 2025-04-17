<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SHGKinerjaTargetStatus extends Model
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

    protected $table = 'shg_kinerja_target_status_asset';

    protected $fillable = [
        'periode',
        'company',
        'asset_group',
        'green_integrity',
        'yellow_integrity',
        'red_integrity',
        'low_sece',
        'low_pce',
        'low_important',
        'information'
    ];
}
