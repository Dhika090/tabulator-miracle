<?php

namespace App\Models\SHG\TargetKinerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KpiMandatoryCertiSummaryShg extends Model
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
    protected $table = 'shg_kinerja_kpi_mandatory_cer_summary';
    protected $fillable = [
        'periode',
        'subholding',
        'company',
        'unit',
        'posisi_awal_tahun',
        'posisi_vacant_awal_tahun',
        'posisi_terisi_awal_tahun',
        'target_personil_memenuhi_sertifikasi_tahunan',
        'jumlah_sertifikasi_sudah_terbit',
        'jumlah_sertifikasi_belum_terbit',
        'jumlah_learning_hours',
        'jumlah_learning_hours_kumulatif',
        'jumlah_sertifikasi_sudah_terbit_kumulatif',
        'target_personil_memenuhi_sertifikasi_bulanan',
        'target_personil_memenuhi_sertifikasi_kumulatif',
        'target_kpi',
        'real',
        'real_kumulatif',
        'real_kpi',
        'real_kpi_kumulatif',
        'kpi_summary',

    ];
}
