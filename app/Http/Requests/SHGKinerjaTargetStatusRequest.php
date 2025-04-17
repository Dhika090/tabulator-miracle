<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SHGKinerjaTargetStatusRequest extends FormRequest
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
            'periode' => 'required|string',
            'company' => 'required|string',
            'asset_group' => 'required|string',
            'green_integrity' => 'nullable|integer',
            'yellow_integrity' => 'nullable|integer',
            'red_integrity' => 'nullable|integer',
            'low_sece' => 'nullable|integer',
            'low_pce' => 'nullable|integer',
            'low_important' => 'nullable|integer',
            'information' => 'nullable|string',
        ];
    }
}
