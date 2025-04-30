<?php

namespace App\Models\SHG\PertaSamtan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class RencanaPemeliharaanPtsg extends Model
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
    protected $table = 'shg_pertasamtan_rencana_pemeliharaan_ptsg';

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
}
