<?php

namespace App\Models\SHU\KondisiVacant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Regional3KondisiVacant extends Model
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

    protected $table = 'shu_kondisi_vacant_regional_3';

    protected $fillable = [
        'periode',
        'company',
        'total_personil_asset_integrity',
        'jumlah_personil_vacant',
        'jumlah_personil_pensiun',
        'keterangan',
    ];
}
