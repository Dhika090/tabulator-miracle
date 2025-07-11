<?php

namespace App\Models\SHCNT\PelatihanAims;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region4PelatihanAims extends Model
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

    protected $table = 'shcnt_pelatihan_aims_region_4';
    protected $fillable = [
        'periode',
        'company',
        'judul_pelatihan',
        'realisasi_perwira'
    ];
    //
}
