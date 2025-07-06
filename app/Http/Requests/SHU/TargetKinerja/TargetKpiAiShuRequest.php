<?php

namespace App\Http\Requests\SHU\TargetKinerja;

use Illuminate\Foundation\Http\FormRequest;

class TargetKpiAiShuRequest extends FormRequest
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
            'periode' => ['nullable', 'string'],
            'company' => ['nullable', 'string'],
            'penurunan_kumulatif_low_integrity' => ['nullable', 'numeric'],
            'penurunan_kumulatif_medium_integrity' => ['nullable', 'numeric'],
        ];
    }
}
