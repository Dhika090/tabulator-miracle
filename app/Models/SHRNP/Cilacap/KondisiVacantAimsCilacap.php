<?php

namespace App\Models\SHRNP\Cilacap;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class KondisiVacantAimsCilacap extends Model
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

    protected $table = 'shrnp_cilacap_kondisi_vacant_aims';

    protected $fillable = [
        'periode',
        'company',
        'total_personil_asset_integrity',
        'jumlah_personil_vacant',
        'jumlah_personil_pensiun',
        'keterangan',
    ];
}
