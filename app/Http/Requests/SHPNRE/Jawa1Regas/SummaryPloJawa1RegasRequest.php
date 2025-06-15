<?php

namespace App\Http\Requests\SHPNRE\Jawa1Regas;

use Illuminate\Foundation\Http\FormRequest;

class SummaryPloJawa1RegasRequest extends FormRequest
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
            'company' => ['nullable', 'string'],
            'total_plo_exp' => ['nullable', 'integer'],
            'total_plo_exp_lt6' => ['nullable', 'integer'],
            'total_plo_valid' => ['nullable', 'integer'],
            'total_plo_exp_belum_proses' => ['nullable', 'integer'],
            'total_plo_exp_pre_inspection' => ['nullable', 'integer'],
            'total_plo_exp_inspection' => ['nullable', 'integer'],
            'total_plo_exp_ba_pk' => ['nullable', 'integer'],
            'total_plo_exp_coi_peralatan' => ['nullable', 'integer'],
            'total_plo_exp_penerbitan_plo' => ['nullable', 'integer'],
            'total_plo_exp_lt6_belum_proses' => ['nullable', 'integer'],
            'total_plo_exp_lt6_pre_inspection' => ['nullable', 'integer'],
            'total_plo_exp_lt6_inspection' => ['nullable', 'integer'],
            'total_plo_exp_lt6_ba_pk' => ['nullable', 'integer'],
            'total_plo_exp_lt6_coi_peralatan' => ['nullable', 'integer'],
            'total_plo_exp_lt6_penerbitan_plo' => ['nullable', 'integer'],
            'total_plo_valid_belum_proses' => ['nullable', 'integer'],
            'total_plo_valid_pre_inspection' => ['nullable', 'integer'],
            'total_plo_valid_inspection' => ['nullable', 'integer'],
            'total_plo_valid_ba_pk' => ['nullable', 'integer'],
            'total_plo_valid_coi_peralatan' => ['nullable', 'integer'],
            'total_plo_valid_penerbitan_plo' => ['nullable', 'integer'],
            'kendala' => ['nullable', 'string'],
            'tindak_lanjut' => ['nullable', 'string'],
        ];
    }
}
