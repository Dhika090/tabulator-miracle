<?php

namespace App\Models\SHU\TargetKinerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class PrognosaStatusAiShu extends Model
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

    protected $table = 'shu_target_kinerja_prognosa_status_ai';

    protected $fillable = [
        'periode',
        'company',
        'low_sece',
        'low_pce',
        'low_important',
        'med_sece',
        'med_pce',
        'med_important',
        'jumlah',
        'high',
    ];
}
