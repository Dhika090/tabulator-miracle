<?php

namespace App\Http\Requests\SHG\Pertamina;

use Illuminate\Foundation\Http\FormRequest;

class AssetBreakdownPtgRequest extends FormRequest
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
            'periode' => 'required|string',
            'company' => 'required|string',
            'plant_segment' => 'required|string',
            'kategori_criticality' => 'required|string',
            'tag' => 'required|string',
            'deskripsi_peralatan' => 'required|string',
            'jenis_kerusakan' => 'required|string',
            'penyebab' => 'nullable|string',
            'kendala_perbaikan' => 'nullable|string',
            'mitigasi' => 'nullable|string',
            'perbaikan_permanen' => 'nullable|string',
            'progres_perbaikan_permanen' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
            'target_penyelesaian' => 'nullable|string',
            'estimasi_biaya_perbaikan' => 'nullable|numeric',
            'link_foto_video' => 'nullable|string',
        ];
    }
}
