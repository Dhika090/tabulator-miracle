<?php

namespace App\Http\Requests\SHCNT\Availability;

use Illuminate\Foundation\Http\FormRequest;

class Region8AvailabilityRequest extends FormRequest
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
            'company' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:500',
            'target' => 'nullable|numeric',
            'availability' => 'nullable|numeric',
            'isu' => 'nullable|string',
            'kendala' => 'nullable|string|max:550',
            'tindak_lanjut' => 'nullable|string|max:550',
        ];
    }
}
