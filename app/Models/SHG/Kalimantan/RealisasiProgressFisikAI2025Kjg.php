<?php

namespace App\Models\SHG\Kalimantan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class RealisasiProgressFisikAI2025Kjg extends Model
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
    protected $table = 'shg_kalimantan_realisasi_progress_fisik_ai_2025';
    protected $fillable = [
        'periode',
        'no',
        'program_kerja',
        'kategori_aibt',
        'jenis_anggaran',
        'besar_rkap',
        'entitas',
        'unit',
        'nilai_kontrak',
        'plan_jan',
        'plan_feb',
        'plan_mar',
        'plan_apr',
        'plan_may',
        'plan_jun',
        'plan_jul',
        'plan_aug',
        'plan_sep',
        'plan_oct',
        'plan_nov',
        'plan_dec',
        'actual_jan',
        'actual_feb',
        'actual_mar',
        'actual_apr',
        'actual_may',
        'actual_jun',
        'actual_jul',
        'actual_aug',
        'actual_sep',
        'actual_oct',
        'actual_nov',
        'actual_dec',
        'kode',
        'kendala',
        'tindak_lanjut'
    ];

    protected $casts = [
        'plan_jan' => 'decimal:2',
        'plan_feb' => 'decimal:2',
        'plan_mar' => 'decimal:2',
        'plan_apr' => 'decimal:2',
        'plan_may' => 'decimal:2',
        'plan_jun' => 'decimal:2',
        'plan_jul' => 'decimal:2',
        'plan_aug' => 'decimal:2',
        'plan_sep' => 'decimal:2',
        'plan_oct' => 'decimal:2',
        'plan_nov' => 'decimal:2',
        'plan_dec' => 'decimal:2',
        'actual_jan' => 'decimal:2',
        'actual_feb' => 'decimal:2',
        'actual_mar' => 'decimal:2',
        'actual_apr' => 'decimal:2',
        'actual_may' => 'decimal:2',
        'actual_jun' => 'decimal:2',
        'actual_jul' => 'decimal:2',
        'actual_aug' => 'decimal:2',
        'actual_sep' => 'decimal:2',
        'actual_oct' => 'decimal:2',
        'actual_nov' => 'decimal:2',
        'actual_dec' => 'decimal:2',
    ];
}
