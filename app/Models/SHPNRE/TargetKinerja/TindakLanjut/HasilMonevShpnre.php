<?php

namespace App\Models\SHPNRE\TargetKinerja\TindakLanjut;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class HasilMonevShpnre extends Model
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

    protected $table = 'shpnre_tindak_lanjut_hasil_monev';
    protected $fillable = [
        'periode',
        'no',
        'bahasan',
        'rtl',
        'progress',
    ];
}
