<?php

namespace App\Models\SHG\GagasEnergi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class PelatihanAimsGEI extends Model
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

    protected $table = 'shg_gei_pelatihan_aims';
    protected $fillable = [
        'periode',
        'company',
        'judul_pelatihan',
        'realisasi_perwira'
    ];
}
