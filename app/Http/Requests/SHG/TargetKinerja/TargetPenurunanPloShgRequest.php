<?php

namespace App\Http\Requests\SHG\TargetKinerja;

use Illuminate\Foundation\Http\FormRequest;

class TargetPenurunanPloShgRequest extends FormRequest
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
            'subholding' => ['nullable', 'string'],
            'company' => ['nullable', 'string'],
            'plo_expired' => ['nullable', 'integer'],
            'plo_uncertified' => ['nullable', 'integer'],
        ];
    }
}
