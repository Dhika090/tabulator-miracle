<?php

namespace App\Models\SHRNP\Balongan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class AssetBreakdownBalongan extends Model
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

    protected $table = 'shrnp_balongan_asset_breakdown';
    protected $fillable = [
        'periode',
        'company',
        'plant_segment',
        'kategori_criticality',
        'tag',
        'deskripsi_peralatan',
        'jenis_kerusakan',
        'penyebab',
        'kendala_perbaikan',
        'mitigasi',
        'perbaikan_permanen',
        'progres_perbaikan_permanen',
        'tindak_lanjut',
        'target_penyelesaian',
        'estimasi_biaya_perbaikan',
        'link_foto_video'
    ];
}
