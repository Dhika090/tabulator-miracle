<?php

namespace App\Models\SHG\Kalimantan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class StatusPloKjg extends Model
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

    protected $table = 'shg_kalimantan_status_plo_kjg';

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
