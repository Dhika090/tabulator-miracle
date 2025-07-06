<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SHGKinerjaTarget2025AI extends Model
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

    protected $table = 'shg_kinerja_target_2025_ai';
    protected $fillable = [
        'periode',
        'company',
        'penurunan_kumulatif_low_integrity',
        'penurunan_kumulatif_medium_integrity'
    ];
}
