<?php

namespace App\Http\Requests\SHU\StatusAi;

use Illuminate\Foundation\Http\FormRequest;

class Regional2StatusAiRequest extends FormRequest
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
            'periode' => 'nullable|string|max:20',
            'subholding' => 'nullable|string|max:250',
            'company' => 'nullable|string|max:250',
            'unit' => 'nullable|string|max:250',
            'asset_group' => 'nullable|string|max:250',
            'jumlah' => 'nullable|integer',
            'sece_low_integrity_breakdown' => 'nullable|integer',
            'sece_medium_integrity_due_date_inspection' => 'nullable|integer',
            'sece_medium_integrity_low_condition' => 'nullable|integer',
            'sece_medium_integrity_low_performance' => 'nullable|integer',
            'sece_high_integrity' => 'nullable|integer',
            'pce_low_integrity_breakdown' => 'nullable|integer',
            'pce_medium_integrity_due_date_inspection' => 'nullable|integer',
            'pce_medium_integrity_low_condition' => 'nullable|integer',
            'pce_medium_integrity_low_performance' => 'nullable|integer',
            'pce_high_integrity' => 'nullable|integer',
            'important_low_integrity_breakdown' => 'nullable|integer',
            'important_medium_integrity_due_date_inspection' => 'nullable|integer',
            'important_medium_integrity_low_condition' => 'nullable|integer',
            'important_medium_integrity_low_performance' => 'nullable|integer',
            'important_high_integrity' => 'nullable|integer',
            'secondary_low_integrity_breakdown' => 'nullable|integer',
            'secondary_medium_integrity_due_date_inspection' => 'nullable|integer',
            'secondary_medium_integrity_low_condition' => 'nullable|integer',
            'secondary_medium_integrity_low_performance' => 'nullable|integer',
            'secondary_high_integrity' => 'nullable|integer',
            'kegiatan_penurunan_low' => 'nullable|integer',
            'kegiatan_penurunan_med' => 'nullable|integer',
            'tanggal_realisasi' => 'nullable|date',
            'tanggal_prognosa' => 'nullable|date',
            'informasi_penyebab_low_integrity' => 'nullable|string',
            'informasi_penambahan_jumlah_aset' => 'nullable|string',
            'informasi_naik_turun_low_integrity' => 'nullable|string',
        ];
    }
}
