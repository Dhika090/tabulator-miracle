<?php

namespace App\Models\SHG\PgnSor1;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class AirBudgetTaggingSOR1 extends Model
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

    protected $table = 'shg_pgnsor1_air_budget_tagging';
    protected $fillable = [
        'periode',
        'satker',
        'kategori',
        'ce',
        'cost_element_name',
        'program_kerja',
        'total_pagu_usd',
        'jan',
        'feb',
        'mar',
        'apr',
        'may',
        'jun',
        'jul',
        'aug',
        'sep',
        'oct',
        'nov',
        'dec',
        'aset_integrity',
        'airtagging',
        'prioritas',
        'status_integrity',
        'jumlah_aset_critical_sece',
        'jumlah_aset_critical_pce',
        'jumlah_aset_important',
        'jumlah_aset_secondary'
    ];
}
