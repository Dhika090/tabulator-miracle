<?php

namespace App\Models\SHPNRE\Jawa1Regas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class AvailabilityJawa1Regas extends Model
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

    protected $table = 'shpnre_jawa1regas_availability';
    protected $fillable = [
        'periode',
        'company',
        'kategori',
        'target',
        'availability',
        'isu',
        'kendala',
        'tindak_lanjut'
    ];
}
