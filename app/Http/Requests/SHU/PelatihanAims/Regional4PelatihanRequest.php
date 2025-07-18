<?php

namespace App\Http\Requests\SHU\PelatihanAims;

use Illuminate\Foundation\Http\FormRequest;

class Regional4PelatihanRequest extends FormRequest
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
            'judul_pelatihan' => 'nullable|string|max:255',
            'realisasi_perwira' => 'nullable|string',
        ];
    }
}
