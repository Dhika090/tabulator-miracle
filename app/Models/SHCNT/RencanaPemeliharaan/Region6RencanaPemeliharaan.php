<?php

namespace App\Models\SHCNT\RencanaPemeliharaan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Region6RencanaPemeliharaan extends Model
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
    protected $table = 'shcnt_rencana_pemeliharaan_region_1';

    protected $fillable = [
        'periode',
        'no',
        'company',
        'lokasi',
        'program_kerja',
        'kategori_maintenance',
        'besar_phasing',
        'remark',
        'jan',
        'feb',
        'mar',
        'apr',
        'may',
        'jun',
        'jul',
        'aug',
        'sep',
        'oct',
        'nov',
        'dec',
        'biaya_kerugian',
        'keterangan_kerugian',
        'penyebab',
        'kendala',
        'tindak_lanjut',
    ];
    //
}
