<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SHGKpiAssetIntegrityRequest extends FormRequest
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
            'kpi' => 'required|integer|min:0',
            'kpi_subholding' => 'required|integer|min:0',
        ];
    }
}
