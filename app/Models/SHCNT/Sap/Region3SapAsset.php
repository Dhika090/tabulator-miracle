<?php

namespace App\Models\SHCNT\Sap;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region3SapAsset extends Model
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

    protected $table = 'shcnt_sap_asset_region_1';

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
        'tindak_lanjut',
    ];
    //
}
