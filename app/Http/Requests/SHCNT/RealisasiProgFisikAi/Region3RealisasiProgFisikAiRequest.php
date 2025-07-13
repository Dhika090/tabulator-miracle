<?php

namespace App\Http\Requests\SHCNT\RealisasiProgFisikAi;

use Illuminate\Foundation\Http\FormRequest;

class Region3RealisasiProgFisikAiRequest extends FormRequest
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
            'periode' => ['nullable', 'string'],
            'no' => ['nullable', 'numerik'],
            'program_kerja' => ['nullable', 'string'],
            'kategori_aibt' => ['nullable', 'string'],
            'jenis_anggaran' => ['nullable', 'string'],
            'besar_rkap' => ['nullable', 'string'],
            'entitas' => ['nullable', 'string'],
            'unit' => ['nullable', 'string'],
            'nilai_kontrak' => ['nullable', 'numeric'],
            'plan_jan' => ['nullable', 'numeric'],
            'plan_feb' => ['nullable', 'numeric'],
            'plan_mar' => ['nullable', 'numeric'],
            'plan_apr' => ['nullable', 'numeric'],
            'plan_may' => ['nullable', 'numeric'],
            'plan_jun' => ['nullable', 'numeric'],
            'plan_jul' => ['nullable', 'numeric'],
            'plan_aug' => ['nullable', 'numeric'],
            'plan_sep' => ['nullable', 'numeric'],
            'plan_oct' => ['nullable', 'numeric'],
            'plan_nov' => ['nullable', 'numeric'],
            'plan_dec' => ['nullable', 'numeric'],
            'actual_jan' => ['nullable', 'numeric'],
            'actual_feb' => ['nullable', 'numeric'],
            'actual_mar' => ['nullable', 'numeric'],
            'actual_apr' => ['nullable', 'numeric'],
            'actual_may' => ['nullable', 'numeric'],
            'actual_jun' => ['nullable', 'numeric'],
            'actual_jul' => ['nullable', 'numeric'],
            'actual_aug' => ['nullable', 'numeric'],
            'actual_sep' => ['nullable', 'numeric'],
            'actual_oct' => ['nullable', 'numeric'],
            'actual_nov' => ['nullable', 'numeric'],
            'actual_dec' => ['nullable', 'numeric'],
            'kode' => ['nullable', 'string'],
            'kendala' => ['nullable', 'string'],
            'tindak_lanjut' => ['nullable', 'string'],
        ];
    }
}
