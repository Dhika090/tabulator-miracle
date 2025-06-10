<?php

namespace App\Models\SHPNRE\LumutBalai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SummaryPloLB extends Model
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

    protected $table = 'shpnre_lumut_balai_summary_plo';
    protected $fillable = [
        'periode',
        'company',
        'total_plo_exp',
        'total_plo_exp_lt6',
        'total_plo_valid',
        'total_plo_exp_belum_proses',
        'total_plo_exp_pre_inspection',
        'total_plo_exp_inspection',
        'total_plo_exp_ba_pk',
        'total_plo_exp_coi_peralatan',
        'total_plo_exp_penerbitan_plo',
        'total_plo_exp_lt6_belum_proses',
        'total_plo_exp_lt6_pre_inspection',
        'total_plo_exp_lt6_inspection',
        'total_plo_exp_lt6_ba_pk',
        'total_plo_exp_lt6_coi_peralatan',
        'total_plo_exp_lt6_penerbitan_plo',
        'total_plo_valid_belum_proses',
        'total_plo_valid_pre_inspection',
        'total_plo_valid_inspection',
        'total_plo_valid_ba_pk',
        'total_plo_valid_coi_peralatan',
        'total_plo_valid_penerbitan_plo',
        'kendala',
        'tindak_lanjut'
    ];
}
