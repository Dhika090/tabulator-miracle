<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SHGTargetStatusPloRequest extends FormRequest
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
            'uncertified' => 'required|integer|min:0',
            'exp' => 'required|integer|min:0',
            'exp_less_than_6' => 'required|integer|min:0',
            'valid' => 'required|integer|min:0',
        ];
    }
}
