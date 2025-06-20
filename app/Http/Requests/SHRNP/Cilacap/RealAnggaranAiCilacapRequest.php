<?php

namespace App\Http\Requests\SHRNP\Cilacap;

use Illuminate\Foundation\Http\FormRequest;

class RealAnggaranAiCilacapRequest extends FormRequest
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
            'no' => ['nullable', 'integer'],
            'program_kerja' => ['nullable', 'string', 'max:255'],
            'kategori_aibt' => ['nullable', 'string', 'max:255'],
            'jenis_anggaran' => ['nullable', 'string', 'max:255'],
            'besar_rkap' => ['nullable', 'string'],
            'entitas' => ['nullable', 'string', 'max:255'],
            'unit' => ['nullable', 'string', 'max:255'],
            'nilai_kontrak' => ['nullable', 'string'],
            'plan_jan' => ['nullable', 'string'],
            'plan_feb' => ['nullable', 'string'],
            'plan_mar' => ['nullable', 'string'],
            'plan_apr' => ['nullable', 'string'],
            'plan_may' => ['nullable', 'string'],
            'plan_jun' => ['nullable', 'string'],
            'plan_jul' => ['nullable', 'string'],
            'plan_aug' => ['nullable', 'string'],
            'plan_sep' => ['nullable', 'string'],
            'plan_oct' => ['nullable', 'string'],
            'plan_nov' => ['nullable', 'string'],
            'plan_dec' => ['nullable', 'string'],
            'prognosa_jan' => ['nullable', 'string'],
            'prognosa_feb' => ['nullable', 'string'],
            'prognosa_mar' => ['nullable', 'string'],
            'prognosa_apr' => ['nullable', 'string'],
            'prognosa_may' => ['nullable', 'string'],
            'prognosa_jun' => ['nullable', 'string'],
            'prognosa_jul' => ['nullable', 'string'],
            'prognosa_aug' => ['nullable', 'string'],
            'prognosa_sep' => ['nullable', 'string'],
            'prognosa_oct' => ['nullable', 'string'],
            'prognosa_nov' => ['nullable', 'string'],
            'prognosa_dec' => ['nullable', 'string'],
            'actual_jan' => ['nullable', 'string'],
            'actual_feb' => ['nullable', 'string'],
            'actual_mar' => ['nullable', 'string'],
            'actual_apr' => ['nullable', 'string'],
            'actual_may' => ['nullable', 'string'],
            'actual_jun' => ['nullable', 'string'],
            'actual_jul' => ['nullable', 'string'],
            'actual_aug' => ['nullable', 'string'],
            'actual_sep' => ['nullable', 'string'],
            'actual_oct' => ['nullable', 'string'],
            'actual_nov' => ['nullable', 'string'],
            'actual_dec' => ['nullable', 'string'],
            'kode' => ['nullable', 'string', 'max:255'],
            'kendala' => ['nullable', 'string', 'max:255'],
            'tindak_lanjut' => ['nullable', 'string', 'max:255'],
        ];
    }
}
