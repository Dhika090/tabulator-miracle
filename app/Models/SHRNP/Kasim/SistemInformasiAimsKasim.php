<?php

namespace App\Models\SHRNP\Kasim;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class SistemInformasiAimsKasim extends Model
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

    protected $table = 'shrnp_kasim_sistem_informasi_aims';

    protected $fillable = [
        'periode',
        'company',
        'jumlah_aset_operasi',
        'jumlah_aset_teregister',
        'kendala_aset_register',
        'tindak_lanjut_aset_register',
        'sistem_informasi_aim',
        'total_wo_comply',
        'total_wo_completed',
        'total_wo_in_progress',
        'total_wo_backlog',
        'kendala',
        'tindak_lanjut',
    ];
}
