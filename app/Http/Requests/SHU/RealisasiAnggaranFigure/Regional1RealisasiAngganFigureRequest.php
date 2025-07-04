<?php

namespace App\Http\Requests\SHU\RealisasiAnggaranFigure;

use Illuminate\Foundation\Http\FormRequest;

class Regional1RealisasiAngganFigureRequest extends FormRequest
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
            'no' => ['nullable', 'integer'],
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
            'plan_mei' => ['nullable', 'numeric'],
            'plan_jun' => ['nullable', 'numeric'],
            'plan_jul' => ['nullable', 'numeric'],
            'plan_agu' => ['nullable', 'numeric'],
            'plan_sep' => ['nullable', 'numeric'],
            'plan_okt' => ['nullable', 'numeric'],
            'plan_nov' => ['nullable', 'numeric'],
            'plan_des' => ['nullable', 'numeric'],

            'prognosa_jan' => ['nullable', 'numeric'],
            'prognosa_feb' => ['nullable', 'numeric'],
            'prognosa_mar' => ['nullable', 'numeric'],
            'prognosa_apr' => ['nullable', 'numeric'],
            'prognosa_mei' => ['nullable', 'numeric'],
            'prognosa_jun' => ['nullable', 'numeric'],
            'prognosa_jul' => ['nullable', 'numeric'],
            'prognosa_agu' => ['nullable', 'numeric'],
            'prognosa_sep' => ['nullable', 'numeric'],
            'prognosa_okt' => ['nullable', 'numeric'],
            'prognosa_nov' => ['nullable', 'numeric'],
            'prognosa_des' => ['nullable', 'numeric'],

            'actual_jan' => ['nullable', 'numeric'],
            'actual_feb' => ['nullable', 'numeric'],
            'actual_mar' => ['nullable', 'numeric'],
            'actual_apr' => ['nullable', 'numeric'],
            'actual_mei' => ['nullable', 'numeric'],
            'actual_jun' => ['nullable', 'numeric'],
            'actual_jul' => ['nullable', 'numeric'],
            'actual_agu' => ['nullable', 'numeric'],
            'actual_sep' => ['nullable', 'numeric'],
            'actual_okt' => ['nullable', 'numeric'],
            'actual_nov' => ['nullable', 'numeric'],
            'actual_des' => ['nullable', 'numeric'],

            'kode' => ['nullable', 'string'],
            'kendala' => ['nullable', 'string', 'max:550'],
            'tindak_lanjut' => ['nullable', 'string', 'max:550'],
        ];
    }
}
