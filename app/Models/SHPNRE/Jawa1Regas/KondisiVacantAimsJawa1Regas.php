<?php

namespace App\Models\SHPNRE\Jawa1Regas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class KondisiVacantAimsJawa1Regas extends Model
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

    protected $table = 'shpnre_jawa1regas_kondisi_vacant_aims';

    protected $fillable = [
        'periode',
        'company',
        'total_personil_asset_integrity',
        'jumlah_personil_vacant',
        'jumlah_personil_pensiun',
        'keterangan',
    ];
}
