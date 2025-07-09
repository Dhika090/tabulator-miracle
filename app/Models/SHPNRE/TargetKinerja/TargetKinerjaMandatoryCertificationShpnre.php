<?php

namespace App\Models\SHPNRE\TargetKinerja;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetKinerjaMandatoryCertificationShpnre extends Model
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

    protected $table = 'shpnre_kinerja_target_mandatory_certification_shpnre';
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
