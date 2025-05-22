<?php

namespace App\Http\Requests\SHG\PgnLngIndonesia;

use Illuminate\Foundation\Http\FormRequest;

class RealisasiProgressFisikAiPLIRequest extends FormRequest
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
            'periode' => 'nullable|string|max:7',
            'no' => 'nullable|string|max:255',
            'program_kerja' => 'nullable|string|max:255',
            'kategori_aibt' => 'nullable|string|max:255',
            'jenis_anggaran' => 'nullable|string|max:255',
            'besar_rkap' => 'nullable|string|max:255',
            'entitas' => 'nullable|string|max:255',
            'unit' => 'nullable|string|max:255',
            'nilai_kontrak' => 'nullable|string|max:255',
            'plan_jan' => 'nullable|string',
            'plan_feb' => 'nullable|string',
            'plan_mar' => 'nullable|string',
            'plan_apr' => 'nullable|string',
            'plan_may' => 'nullable|string',
            'plan_jun' => 'nullable|string',
            'plan_jul' => 'nullable|string',
            'plan_aug' => 'nullable|string',
            'plan_sep' => 'nullable|string',
            'plan_oct' => 'nullable|string',
            'plan_nov' => 'nullable|string',
            'plan_dec' => 'nullable|string',
            'actual_jan' => 'nullable|string',
            'actual_feb' => 'nullable|string',
            'actual_mar' => 'nullable|string',
            'actual_apr' => 'nullable|string',
            'actual_may' => 'nullable|string',
            'actual_jun' => 'nullable|string',
            'actual_jul' => 'nullable|string',
            'actual_aug' => 'nullable|string',
            'actual_sep' => 'nullable|string',
            'actual_oct' => 'nullable|string',
            'actual_nov' => 'nullable|string',
            'actual_dec' => 'nullable|string',
            'kode' => 'nullable|string|max:255',
            'kendala' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ];
    }

    protected function prepareForValidation()
    {
        $fields = [
            'plan_jan',
            'plan_feb',
            'plan_mar',
            'plan_apr',
            'plan_may',
            'plan_jun',
            'plan_jul',
            'plan_aug',
            'plan_sep',
            'plan_oct',
            'plan_nov',
            'plan_dec',
            'actual_jan',
            'actual_feb',
            'actual_mar',
            'actual_apr',
            'actual_may',
            'actual_jun',
            'actual_jul',
            'actual_aug',
            'actual_sep',
            'actual_oct',
            'actual_nov',
            'actual_dec',
        ];

        $sanitized = [];
        foreach ($fields as $field) {
            if ($this->has($field)) {
                $sanitized[$field] = str_replace(['.', ','], '', $this->input($field));
            }
        }

        $this->merge($sanitized);
    }

}
