<?php

namespace App\Http\Requests\SHG\PertagasNiaga;

use Illuminate\Foundation\Http\FormRequest;

class PlanMandatoryCertificationPTGNRequest extends FormRequest
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
            'nama_personil_tersertifikasi_plan' => 'nullable|string|max:255',
            'jumlah_sertifikasi' => 'nullable|integer',
            'nama_sertifikasi' => 'nullable|string|max:255',
            'lembaga_penerbit_sertifikat' => 'nullable|string|max:255',
        ];
    }
}
