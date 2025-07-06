<?php

namespace App\Http\Requests\SHU\TargetKinerja\TindakLanjut;

use Illuminate\Foundation\Http\FormRequest;

class HighlightStatusAiRequest extends FormRequest
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
            'no' => 'nullable|integer|min:0',
            'highlight' => 'nullable|string',
        ];
    }
}
