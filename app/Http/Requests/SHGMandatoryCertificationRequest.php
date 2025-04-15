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
            'periode' => 'required|string|max:255',
            'subholding' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'posisi_awal_tahun' => 'required|integer|min:0',
            'posisi_vacant_awal_tahun' => 'required|integer|min:0',
            'posisi_terisi_awal_tahun' => 'required|integer|min:0',
            'target_personil_memenuhi_sertifikasi' => 'required|integer|min:0',
            'jumlah_sertifikasi_sudah_terbit' => 'required|integer|min:0',
            'jumlah_sertifikasi_belum_terbit' => 'required|integer|min:0',
            'jumlah_learning_hours' => 'required|integer|min:0',
            'target_kpi' => 'required|integer|min:0',
        ];
    }
}
