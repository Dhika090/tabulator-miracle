<?php

namespace App\Models\SHG\TargetKinerja\Tl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class TlHighlightStatusPlo extends Model
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

    protected $table = 'shg_tindak_lanjut_highlight_status_plo';
    protected $fillable = [
        'periode',
        'no',
        'highlight',
    ];
}
