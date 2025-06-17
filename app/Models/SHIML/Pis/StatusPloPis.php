<?php

namespace App\Models\SHIML\Pis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class StatusPloPis extends Model
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

    protected $table = 'shiml_pis_status_plo';

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
