<?php

namespace App\Http\Requests\SHG\Kalimantan;

use Illuminate\Foundation\Http\FormRequest;

class MandatoryCertificationKjgRequest extends FormRequest
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
            'subholding' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'nama_sertifikasi' => 'nullable|string|max:255',
            'lembaga_penerbit_sertifikat' => 'nullable|string|max:255',
            'jumlah_sertifikasi_terbit' => 'nullable|integer',
            'jumlah_learning_hours' => 'nullable|integer',
        ];
    }
}
