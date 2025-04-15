<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SHGTargeStatusAssetIntergrityRequest extends FormRequest
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
            'asset_group' => 'required|string|max:255',
            'green_integrity' => 'required|integer|min:0',
            'yellow_integrity' => 'required|integer|min:0',
            'red_integrity' => 'required|integer|min:0',
            'information' => 'required|string|max:255',
        ];
    }
}
