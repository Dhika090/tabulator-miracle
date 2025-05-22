<?php

namespace App\Models\SHG\Pertamina;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class SapAssetPtg extends Model
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

    protected $table = 'shg_pertamina_sap_asset';

    protected $fillable = [
        'periode',
        'subholding',
        'company',
        'unit',
        'nama_stasiun',
        'belum_mulai',
        'kickoff_meeting',
        'identifikasi_peralatan',
        'survey_lapangan',
        'pembenahan_funloc',
        'review_criticality',
        'penyelarasan_dokumen',
        'melengkapi_tag_fisik',
        'form_upload_data',
        'request_master_data',
        'update_master_data',
        'kendala',
        'tindak_lanjut',
    ];
}
