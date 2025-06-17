<?php

namespace App\Models\SHIML\Pis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class MandatoryCertificationPis extends Model
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

    protected $table = 'shiml_pis_mandatory_certification';

    protected $fillable = [
        'periode',
        'subholding',
        'company',
        'unit',
        'nama_sertifikasi',
        'lembaga_penerbit_sertifikat',
        'jumlah_sertifikasi_terbit',
        'jumlah_learning_hours',
    ];
}
