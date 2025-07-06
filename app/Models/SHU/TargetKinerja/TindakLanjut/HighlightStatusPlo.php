<?php

namespace App\Models\SHU\TargetKinerja\TindakLanjut;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class HighlightStatusPlo extends Model
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

    protected $table = 'shu_tindak_lanjut_highlight_status_plo';
    protected $fillable = [
        'periode',
        'no',
        'highlight',
    ];
}
