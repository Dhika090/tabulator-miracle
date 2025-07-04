<?php

namespace App\Http\Requests\SHRNP\Balongan;

use Illuminate\Foundation\Http\FormRequest;

class StatusAssetAiBalonganRequest extends FormRequest
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
            'jumlah' => 'nullable|string',

            'sece_low_integrity_breakdown' => 'nullable|string',
            'sece_medium_due_date_inspection' => 'nullable|string',
            'sece_medium_low_condition' => 'nullable|string',
            'sece_medium_low_performance' => 'nullable|string',
            'sece_high_integrity' => 'nullable|string',

            'pce_low_integrity_breakdown' => 'nullable|string',
            'pce_medium_due_date_inspection' => 'nullable|string',
            'pce_medium_low_condition' => 'nullable|string',
            'pce_medium_low_performance' => 'nullable|string',
            'pce_high_integrity' => 'nullable|string',

            'important_low_integrity_breakdown' => 'nullable|string',
            'important_medium_due_date_inspection' => 'nullable|string',
            'important_medium_low_condition' => 'nullable|string',
            'important_medium_low_performance' => 'nullable|string',
            'important_high_integrity' => 'nullable|string',

            'secondary_low_integrity_breakdown' => 'nullable|string',
            'secondary_medium_due_date_inspection' => 'nullable|string',
            'secondary_medium_low_condition' => 'nullable|string',
            'secondary_medium_low_performance' => 'nullable|string',
            'secondary_high_integrity' => 'nullable|string',

            'kegiatan_penurunan_low' => 'nullable|string',
            'kegiatan_penurunan_med' => 'nullable|string',
            'informasi_penyebab_low_integrity' => 'nullable|string',
            'informasi_penambahan_jumlah_aset' => 'nullable|string',
            'informasi_naik_turun_low_integrity' => 'nullable|string',
        ];
    }
}
