<?php

namespace App\Models\SHG\TransportasiGas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class AvailabilityTGI extends Model
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

    protected $table = 'shg_tgi_availability';
    protected $fillable = [
        'periode',
        'company',
        'kategori',
        'target',
        'availability',
        'isu',
        'kendala',
        'tindak_lanjut'
    ];
}
