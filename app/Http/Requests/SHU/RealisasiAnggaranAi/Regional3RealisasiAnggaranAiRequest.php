<?php

namespace App\Http\Requests\SHU\RealisasiAnggaranAi;

use Illuminate\Foundation\Http\FormRequest;

class Regional3RealisasiAnggaranAiRequest extends FormRequest
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
            'periode' => ['nullable', 'string', 'max:255'],
            'no' => ['nullable', 'string', 'max:255'],
            'program_kerja' => ['nullable', 'string', 'max:255'],
            'kategori_aibt' => ['nullable', 'string', 'max:255'],
            'jenis_anggaran' => ['nullable', 'string', 'max:255'],
            'besar_rkap' => ['nullable', 'string'],
            'entitas' => ['nullable', 'string', 'max:255'],
            'unit' => ['nullable', 'string', 'max:255'],
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
            'prognosa_jan' => ['nullable', 'numeric'],
            'prognosa_feb' => ['nullable', 'numeric'],
            'prognosa_mar' => ['nullable', 'numeric'],
            'prognosa_apr' => ['nullable', 'numeric'],
            'prognosa_may' => ['nullable', 'numeric'],
            'prognosa_jun' => ['nullable', 'numeric'],
            'prognosa_jul' => ['nullable', 'numeric'],
            'prognosa_aug' => ['nullable', 'numeric'],
            'prognosa_sep' => ['nullable', 'numeric'],
            'prognosa_oct' => ['nullable', 'numeric'],
            'prognosa_nov' => ['nullable', 'numeric'],
            'prognosa_dec' => ['nullable', 'numeric'],
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
            'kode' => ['nullable', 'string', 'max:550'],
            'kendala' => ['nullable', 'string', 'max:550'],
            'tindak_lanjut' => ['nullable', 'string', 'max:550'],
        ];
    }
}
