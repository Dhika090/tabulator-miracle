<?php

namespace App\Http\Requests\SHG\Kalimantan;

use Illuminate\Foundation\Http\FormRequest;

class AvailabilityKjgRequest extends FormRequest
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
            'company' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'target' => 'nullable|numeric|between:0,100.0',
            'availability' => 'nullable|numeric|between:0,100.0',
            'isu' => 'nullable|string',
            'kendala' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ];
    }
}
