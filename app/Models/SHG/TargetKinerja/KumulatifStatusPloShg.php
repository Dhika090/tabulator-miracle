<?php

namespace App\Models\SHG\TargetKinerja;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class KumulatifStatusPloShg extends Model
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

    protected $table = 'shg_target_kinerja_prognosa_status_plo';
    protected $fillable = [
        'periode',
        'company',
        'uncertified',
        'exp',
        'exp_lt6',
        'valid',
    ];
}
