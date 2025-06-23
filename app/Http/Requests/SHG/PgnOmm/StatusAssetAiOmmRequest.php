<?php

namespace App\Http\Requests\SHG\PgnOmm;

use Illuminate\Foundation\Http\FormRequest;

class StatusAssetAiOmmRequest extends FormRequest
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
            'jumlah' => 'nullable|numeric',

            'sece_low_breakdown' => 'nullable|numeric',
            'sece_medium_due_date_inspection' => 'nullable|numeric',
            'sece_medium_low_condition' => 'nullable|numeric',
            'sece_medium_low_performance' => 'nullable|numeric',
            'sece_high' => 'nullable|numeric',

            'pce_low_breakdown' => 'nullable|numeric',
            'pce_medium_due_date_inspection' => 'nullable|numeric',
            'pce_medium_low_condition' => 'nullable|numeric',
            'pce_medium_low_performance' => 'nullable|numeric',
            'pce_high' => 'nullable|numeric',

            'important_low_breakdown' => 'nullable|numeric',
            'important_medium_due_date_inspection' => 'nullable|numeric',
            'important_medium_low_condition' => 'nullable|numeric',
            'important_medium_low_performance' => 'nullable|numeric',
            'important_high' => 'nullable|numeric',

            'secondary_low_breakdown' => 'nullable|numeric',
            'secondary_medium_due_date_inspection' => 'nullable|numeric',
            'secondary_medium_low_condition' => 'nullable|numeric',
            'secondary_medium_low_performance' => 'nullable|numeric',
            'secondary_high' => 'nullable|numeric',

            'kegiatan_penurunan_low' => 'nullable|numeric',
            'kegiatan_penurunan_med' => 'nullable|numeric',
            'penyebab_low_integrity' => 'nullable|string',
            'penambahan_jumlah_aset' => 'nullable|string',
            'naik_turun_low_integrity' => 'nullable|string',
        ];
    }
}
