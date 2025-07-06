<?php

namespace App\Http\Requests\SHU\TargetKinerja;

use Illuminate\Foundation\Http\FormRequest;

class KinerjaKpiStatusAiShuRequest extends FormRequest
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
            'company' => 'nullable|string',
            'target_penurunan_aset_low_tahunan' => 'nullable|numeric',
            'target_penurunan_aset_med_tahunan' => 'nullable|numeric',
            'target_penurunan_aset_low' => 'nullable|numeric',
            'target_penurunan_aset_med' => 'nullable|numeric',
            'realisasi_penurunan_low' => 'nullable|numeric',
            'realisasi_penurunan_med' => 'nullable|numeric',
            'target' => 'nullable|numeric',
            'target_kumulatif' => 'nullable|numeric',
            'real' => 'nullable|numeric',
            'real_kumulatif' => 'nullable|numeric',
            'real_kpi' => 'nullable|numeric',
            'real_kpi_kumulatif' => 'nullable|numeric',
            'kpi_summary' => 'nullable|numeric',
        ];
    }
}
