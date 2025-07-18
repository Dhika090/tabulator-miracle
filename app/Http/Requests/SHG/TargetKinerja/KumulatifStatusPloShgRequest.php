<?php

namespace App\Http\Requests\SHG\TargetKinerja;

use Illuminate\Foundation\Http\FormRequest;

class KumulatifStatusPloShgRequest extends FormRequest
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
            'subholding' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'unit' => 'nullable|string|max:255',
            'plo_expired' => 'nullable|integer|default:0',
            'plo_uncertified' => 'nullable|integer|default:0',
        ];
    }
}
