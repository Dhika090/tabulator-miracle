<?php

namespace App\Models\SHU\StatusPlo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Regional4StatusPlo extends Model
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

    protected $table = 'shu_status_plo_regional_4';

    protected $fillable = [
        'periode',
        'nomor_plo',
        'company',
        'area',
        'lokasi',
        'nama_aset',
        'tanggal_pengesahan',
        'masa_berlaku',
        'keterangan',
        'belum_proses',
        'pre_inspection',
        'inspection',
        'coi_peralatan',
        'ba_pk',
        'penerbitan_plo_valid',
        'kendala',
        'tindak_lanjut',
    ];
}
