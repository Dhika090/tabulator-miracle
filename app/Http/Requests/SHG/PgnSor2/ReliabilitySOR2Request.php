<?php

namespace App\Http\Requests\SHG\PgnSor2;

use Illuminate\Foundation\Http\FormRequest;

class ReliabilitySOR2Request extends FormRequest
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
            'company' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:500',
            'target' => 'nullable|numeric',
            'reliability' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
        ];
    }
}
