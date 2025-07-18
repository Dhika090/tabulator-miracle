<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SHGMandatoryCertificationRequest extends FormRequest
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
            'posisi_awal_tahun' => 'nullable|numeric',
            'posisi_vacant_awal_tahun' => 'nullable|numeric',
            'posisi_terisi_awal_tahun' => 'nullable|numeric',
            'target_personil_memenuhi_sertifikasi_tahunan' => 'nullable|numeric',
        ];
    }
}
