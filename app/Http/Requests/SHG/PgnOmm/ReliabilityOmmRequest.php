<?php

namespace App\Http\Requests\SHG\PgnOmm;

use Illuminate\Foundation\Http\FormRequest;

class ReliabilityOmmRequest extends FormRequest
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
            'periode' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:50',
            'kategori' => 'nullable|string|max:50',
            'target' => 'nullable|numeric|between:0,100',
            'reliability' => 'nullable|numeric|between:0,100',
            'keterangan' => 'nullable|string|max:550',
        ];
    }
}
