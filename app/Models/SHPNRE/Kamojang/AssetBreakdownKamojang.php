<?php

namespace App\Models\SHPNRE\Kamojang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class AssetBreakdownKamojang extends Model
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

    protected $table = 'shpnre_kamojang_asset_breakdown';
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
