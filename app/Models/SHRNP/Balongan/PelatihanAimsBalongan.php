<?php

namespace App\Models\SHRNP\Balongan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class PelatihanAimsBalongan extends Model
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

    protected $table = 'shrnp_balongan_pelatihan_aims';
    protected $fillable = [
        'periode',
        'company',
        'judul_pelatihan',
        'realisasi_perwira'
    ];
}
