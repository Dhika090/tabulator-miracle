<?php

namespace App\Http\Requests\SHRNP\Kasim;

use Illuminate\Foundation\Http\FormRequest;

class AvailabilityKasimRequest extends FormRequest
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
            'company' => 'nullable|string',
            'kategori' => 'nullable|string',
            'target' => 'nullable|numeric',
            'availability' => 'nullable|numeric',
            'isu' => 'nullable|string',
            'kendala' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ];
    }
}
