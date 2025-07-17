<?php

namespace App\Models\MONA\Iis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class ApkNonRutin extends Model
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

    protected $table = 'mona_iis_apk_non_rutin';

    protected $fillable = [
        'aktifitas',
        'tanggal_Mulai',
        'target_penyelesaian',
        'realisasi_penyelesaian',
        'status',
        'pic',
        'tindak_lanjut',
        'nama_dokumen',
        'nomor_dokumen',
        'link_storage_dokumen',
        'keterangan',
    ];
}
