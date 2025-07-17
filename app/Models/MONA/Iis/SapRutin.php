<?php

namespace App\Models\MONA\Iis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SapRutin extends Model
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

    protected $table = 'mona_iis_sap_rutin';

    protected $fillable = [
        'periode',
        'no',
        'aktifitas',
        'interval',
        'pic',
        'plan_jan',
        'target_jan',
        'actual_jan',
        'plan_feb',
        'target_feb',
        'actual_feb',
        'plan_mar',
        'target_mar',
        'actual_mar',
        'plan_apr',
        'target_apr',
        'actual_apr',
        'plan_may',
        'target_may',
        'actual_may',
        'plan_jun',
        'target_jun',
        'actual_jun',
        'plan_jul',
        'target_jul',
        'actual_jul',
        'plan_aug',
        'target_aug',
        'actual_aug',
        'plan_sep',
        'target_sep',
        'actual_sep',
        'plan_oct',
        'target_oct',
        'actual_oct',
        'plan_nov',
        'target_nov',
        'actual_nov',
        'plan_dec',
        'target_dec',
        'actual_dec',
        'tindak_lanjut',
        'nama_dokumen',
        'nomor_dokumen',
        'link_storage_dokumen',
        'keterangan',
    ];
}
