<?php

namespace App\Http\Requests\SHU\TargetKinerja;

use Illuminate\Foundation\Http\FormRequest;

class KinerjaKpiPemnhnPloShuRequest extends FormRequest
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
            'company' => 'nullable|string|max:255',
            'target_pemenuhan_plo_expired_tahunan' => 'nullable|integer',
            'target_pemenuhan_plo_uncertified_tahunan' => 'nullable|integer',
            'target_penurunan_plo_expired' => 'nullable|integer',
            'target_penurunan_plo_uncertified' => 'nullable|integer',
            'realisasi_plo_expired' => 'nullable|integer',
            'realisasi_plo_uncertified' => 'nullable|integer',
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
