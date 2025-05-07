<?php

namespace App\Models\SHG\PertagasNiaga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class PlanMandatoryCertificationPTGN extends Model
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

    protected $table = 'shg_ptgn_plan_mandatory_ceritification';

    protected $fillable = [
        'periode',
        'subholding',
        'company',
        'unit',
        'nama_personil_tersertifikasi_plan',
        'jumlah_sertifikasi',
        'nama_sertifikasi',
        'lembaga_penerbit_sertifikat',
    ];
}
