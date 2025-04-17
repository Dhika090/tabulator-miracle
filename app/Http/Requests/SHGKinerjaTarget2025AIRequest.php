<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SHGKinerjaTarget2025AIRequest extends FormRequest
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
            'penurunan_kumulatif_low_integrity' => 'required|integer|min:0',
            'penurunan_kumulatif_medium_integrity' => 'required|integer|min:0',
        ];
    }
}
