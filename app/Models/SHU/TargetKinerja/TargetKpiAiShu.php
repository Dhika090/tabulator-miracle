<?php

namespace App\Models\SHU\TargetKinerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class TargetKpiAiShu extends Model
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

    protected $table = 'shu_target_kinerja_target_kpi_2025_ai';
    protected $fillable = [
        'periode',
        'company',
        'penurunan_kumulatif_low_integrity',
        'penurunan_kumulatif_medium_integrity'
    ];
}
