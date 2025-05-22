<?php

namespace App\Http\Requests\SHG\PertaArun;

use Illuminate\Foundation\Http\FormRequest;

class StatusPloPAGRequest extends FormRequest
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
            'nomor_plo' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'nama_aset' => 'nullable|string|max:255',
            'tanggal_pengesahan' => 'nullable|string',
            'masa_berlaku' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'belum_proses' => 'nullable|integer',
            'pre_inspection' => 'nullable|integer',
            'inspection' => 'nullable|integer',
            'coi_peralatan' => 'nullable|integer',
            'ba_pk' => 'nullable|integer',
            'penerbitan_plo_valid' => 'nullable|integer',
            'kendala' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ];
    }
}
