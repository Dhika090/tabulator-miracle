<?php

namespace App\Http\Requests\SHPNRE\TargetKinerja;

use Illuminate\Foundation\Http\FormRequest;

class TargetSapAssetPnreRequest extends FormRequest
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
            'jumlah_unit_yang_harus_dibenahi' => 'nullable|integer',
            'jumlah_unit_yang_sedang_dibenahi' => 'nullable|integer',
        ];
    }
}
