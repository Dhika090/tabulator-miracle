<?php

namespace App\Http\Requests\SHG\PgnOmm;

use Illuminate\Foundation\Http\FormRequest;

class AssetBreakdownOmmRequest extends FormRequest
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
            'company' => 'nullable|string',
            'plant_segment' => 'nullable|string',
            'kategori_criticality' => 'nullable|string',
            'tag' => 'nullable|string',
            'deskripsi_peralatan' => 'nullable|string',
            'jenis_kerusakan' => 'nullable|string',
            'penyebab' => 'nullable|string',
            'kendala_perbaikan' => 'nullable|string',
            'mitigasi' => 'nullable|string',
            'perbaikan_permanen' => 'nullable|string',
            'progres_perbaikan_permanen' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
            'target_penyelesaian' => 'nullable|string',
            'estimasi_biaya_perbaikan' => 'nullable|string',
            'link_foto_video' => 'nullable|string',
        ];
    }
}
