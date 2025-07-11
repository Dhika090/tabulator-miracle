<?php

namespace App\Models\SHCNT\KondisiVacantAims;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region3KondisiVacantAims extends Model
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

    protected $table = 'shcnt_kondisi_vacant_aims_region_3';

    protected $fillable = [
        'periode',
        'company',
        'total_personil_asset_integrity',
        'jumlah_personil_vacant',
        'jumlah_personil_pensiun',
        'keterangan',
    ];
    //
}
