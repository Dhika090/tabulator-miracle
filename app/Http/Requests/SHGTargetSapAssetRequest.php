<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SHGTargetSapAssetRequest extends FormRequest
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
            'periode' => 'nullable|string|max:255',
            'subholding' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'unit' => 'nullable|string|min:1',
            'jumlah_unit_yang_harus_dibenahi' => 'nullable|integer|min:1',
            'jumlah_unit_yang_sedang_dibenahi' => 'nullable|integer|min:0',
        ];
    }
}
