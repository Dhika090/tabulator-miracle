<?php

namespace App\Models\SHPNRE\TargetKinerja\TindakLanjut;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class HighLightStatusAiShpnre extends Model
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

    protected $table = 'shpnre_tindak_lanjut_highlight_informasi_domain';
    protected $fillable = [
        'periode',
        'no',
        'highlight',
    ];
}
