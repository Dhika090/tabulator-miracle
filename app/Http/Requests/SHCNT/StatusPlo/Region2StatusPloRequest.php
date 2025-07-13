<?php

namespace App\Http\Requests\SHCNT\StatusPlo;

use Illuminate\Foundation\Http\FormRequest;

class Region2StatusPloRequest extends FormRequest
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
            'nomor_plo' => 'nullable|string',
            'company' => 'nullable|string',
            'area' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'nama_aset' => 'nullable|string',
            'tanggal_pengesahan' => 'nullable|string',
            'masa_berlaku' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'belum_proses' => 'nullable|integer',
            'pre_inspection' => 'nullable|integer',
            'inspection' => 'nullable|integer',
            'ba_pk' => 'nullable|integer',
            'coi_peralatan' => 'nullable|integer',
            'penerbitan_plo_valid' => 'nullable|integer',
            'kendala' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ];
    }
}
