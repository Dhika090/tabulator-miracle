<?php

namespace App\Http\Requests\SHG\TargetKinerja;

use Illuminate\Foundation\Http\FormRequest;

class KinerjaPrognosaStatusAiShgRequest extends FormRequest
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
            'low_sece' => ['nullable', 'integer'],
            'low_pce' => ['nullable', 'integer'],
            'low_important' => ['nullable', 'integer'],
            'med_sece' => ['nullable', 'integer'],
            'med_pce' => ['nullable', 'integer'],
            'med_important' => ['nullable', 'integer'],
            'jumlah' => ['nullable', 'integer'],
            'high' => ['nullable', 'integer'],
        ];
    }
}
