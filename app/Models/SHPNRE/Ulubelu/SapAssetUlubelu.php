<?php

namespace App\Models\SHPNRE\Ulubelu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SapAssetUlubelu extends Model
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

    protected $table = 'shpnre_ulubelu_sap_asset';
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
        'penyelarasan_dokumen_dan_lapangan',
        'melengkapi_tag_fisik',
        'mempersiapkan_form_upload_data',
        'request_ke_master_data',
        'update_di_master_data',
        'kendala',
        'tindak_lanjut'
    ];
}
