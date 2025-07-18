<?php

namespace App\Http\Requests\SHU\TargetKinerja;

use Illuminate\Foundation\Http\FormRequest;

class PrognosaStatusPloSHURequest extends FormRequest
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
            'uncertified' => 'nullable|numeric',
            'exp' => 'nullable|numeric',
            'exp_lt6' => 'nullable|numeric',
            'valid' => 'nullable|numeric',
        ];
    }
}
