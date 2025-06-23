<?php

namespace App\Models\SHU\PelatihanAims;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Regional1Pelatihan extends Model
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

    protected $table = 'shu_pelatihan_regional_1';
    protected $fillable = [
        'periode',
        'company',
        'judul_pelatihan',
        'realisasi_perwira'
    ];
}
