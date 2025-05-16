<?php

namespace App\Models\SHG\PgnSor2;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class ReliabilitySOR2 extends Model
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
    protected $table = 'shg_pgnsor2_reliability';

    protected $fillable = [
        'periode',
        'company',
        'kategori',
        'target',
        'reliability',
        'keterangan',
    ];
}
