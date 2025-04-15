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
            'periode' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'subholding' => 'required|string|max:255',
            'unit' => 'required|string|min:0',
            'jumlah_unit_harus_di_benahi' => 'required|integer|min:0',
            'jumlah_unit_sedang_di_benahi' => 'required|integer|min:0',
        ];
    }
}
