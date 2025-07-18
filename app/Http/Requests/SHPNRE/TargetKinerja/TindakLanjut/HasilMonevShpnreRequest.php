<?php

namespace App\Http\Requests\SHPNRE\TargetKinerja\TindakLanjut;

use Illuminate\Foundation\Http\FormRequest;

class HasilMonevShpnreRequest extends FormRequest
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
            'no' => 'nullable|integer|min:0',
            'bahasan' => 'nullable|string',
            'rtl' => 'nullable|string',
            'progress' => 'nullable|string',
        ];
    }
}
