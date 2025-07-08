<?php

namespace App\Http\Requests\SHG\InputTargetKinerja;

use Illuminate\Foundation\Http\FormRequest;

class KpiMandatoryCertiSummaryShgRequest extends FormRequest
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
            'periode' => 'nullable|string',
            'subholding' => 'nullable|string',
            'company' => 'nullable|string',
            'unit' => 'nullable|string',
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
            'target_kpi' => 'nullable|integer',
            'real' => 'nullable|numeric',
            'real_kumulatif' => 'nullable|numeric',
            'real_kpi' => 'nullable|numeric',
            'real_kpi_kumulatif' => 'nullable|numeric',
            'kpi_summary' => 'nullable|numeric',
        ];
    }
}
