<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SHGTindakLanjutHasilMonevRequest extends FormRequest
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
            'no' => 'required|integer|min:0',
            'bahasan' => 'required|string|max:255',
            'rtl' => 'required|string|max:255',
            'progress' => 'required|string|max:255',
        ];
    }
}
