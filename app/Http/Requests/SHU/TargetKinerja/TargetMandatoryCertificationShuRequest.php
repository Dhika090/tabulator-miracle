<?php

namespace App\Http\Requests\SHU\TargetKinerja;

use Illuminate\Foundation\Http\FormRequest;

class TargetMandatoryCertificationShuRequest extends FormRequest
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
            'posisi_awal_tahun' => 'nullable|integer',
            'posisi_vacant_awal_tahun' => 'nullable|integer',
            'posisi_terisi_awal_tahun' => 'nullable|integer',
            'target_personil_memenuhi_sertifikasi_tahunan' => 'nullable|integer',
            'jumlah_sertifikasi_sudah_terbit' => 'nullable|integer',
            'jumlah_sertifikasi_belum_terbit' => 'nullable|integer',
            'jumlah_learning_hours' => 'nullable|integer',
            'jumlah_learning_hours_kumulatif' => 'nullable|integer',
            'jumlah_sertifikasi_sudah_terbit_kumulatif' => 'nullable|integer',
            'target_personil_memenuhi_sertifikasi_bulanan' => 'nullable|integer',
            'target_personil_memenuhi_sertifikasi_kumulatif' => 'nullable|integer',
            'target_kpi' => 'nullable|numeric',
            'target_kpi_kumulatif' => 'nullable|numeric',
        ];
    }
}
