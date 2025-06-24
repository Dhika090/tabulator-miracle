<?php

namespace App\Http\Requests\SHG\SakaEnergi;

use Illuminate\Foundation\Http\FormRequest;

class StatusAssetAiSakaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'periode' => 'nullable|string',
            'subholding' => 'nullable|string',
            'company' => 'nullable|string',
            'unit' => 'nullable|string',
            'asset_group' => 'nullable|string',
            'jumlah' => 'nullable|integer',

            'sece_low_breakdown' => 'nullable|integer',
            'sece_medium_due_date_inspection' => 'nullable|integer',
            'sece_medium_low_condition' => 'nullable|integer',
            'sece_medium_low_performance' => 'nullable|integer',
            'sece_high' => 'nullable|integer',

            'pce_low_breakdown' => 'nullable|integer',
            'pce_medium_due_date_inspection' => 'nullable|integer',
            'pce_medium_low_condition' => 'nullable|integer',
            'pce_medium_low_performance' => 'nullable|integer',
            'pce_high' => 'nullable|integer',

            'important_low_breakdown' => 'nullable|integer',
            'important_medium_due_date_inspection' => 'nullable|integer',
            'important_medium_low_condition' => 'nullable|integer',
            'important_medium_low_performance' => 'nullable|integer',
            'important_high' => 'nullable|integer',

            'secondary_low_breakdown' => 'nullable|integer',
            'secondary_medium_due_date_inspection' => 'nullable|integer',
            'secondary_medium_low_condition' => 'nullable|integer',
            'secondary_medium_low_performance' => 'nullable|integer',
            'secondary_high' => 'nullable|integer',

            'kegiatan_penurunan_low' => 'nullable|integer',
            'kegiatan_penurunan_med' => 'nullable|integer',
            'penyebab_low_integrity' => 'nullable|string',
            'penambahan_jumlah_aset' => 'nullable|string',
            'naik_turun_low_integrity' => 'nullable|string',
        ];
    }
}
