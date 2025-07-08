<?php

namespace App\Models\SHG\TargetKinerja;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class TargetPenurunanPloShg extends Model
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

    protected $table = 'shg_target_kinerja_target_penurunan_plo';
    protected $fillable = [
        'periode',
        'subholding',
        'company',
        'plo_expired',
        'plo_uncertified',
    ];
}
