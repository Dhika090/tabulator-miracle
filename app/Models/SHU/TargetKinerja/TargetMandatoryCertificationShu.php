<?php

namespace App\Models\SHU\TargetKinerja;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TargetMandatoryCertificationShu extends Model
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

    protected $table = 'shu_target_kinerja_target_mandatory_certification_shu';
    protected $fillable = [
        'periode',
        'subholding',
        'company',
        'unit',
        'posisi_awal_tahun',
        'posisi_vacant_awal_tahun',
        'posisi_terisi_awal_tahun',
        'target_personil_memenuhi_sertifikasi_tahunan',
        'target_personil_memenuhi_sertifikasi_bulanan',
        'target_personil_memenuhi_sertifikasi_kumulatif',
        'target_kpi',
        'target_kpi_kumulatif',
    ];
}
