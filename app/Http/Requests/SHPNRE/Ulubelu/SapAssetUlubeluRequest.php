<?php

namespace App\Http\Requests\SHPNRE\Ulubelu;

use Illuminate\Foundation\Http\FormRequest;

class SapAssetUlubeluRequest extends FormRequest
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
            'nama_stasiun' => 'nullable|string|max:255',
            'belum_mulai' => 'nullable|integer',
            'kickoff_meeting' => 'nullable|integer',
            'identifikasi_peralatan' => 'nullable|integer',
            'survey_lapangan' => 'nullable|integer',
            'pembenahan_funloc' => 'nullable|integer',
            'review_criticality' => 'nullable|integer',
            'penyelarasan_dokumen_dan_lapangan' => 'nullable|integer',
            'melengkapi_tag_fisik' => 'nullable|integer',
            'mempersiapkan_form_upload_data' => 'nullable|integer',
            'request_ke_master_data' => 'nullable|integer',
            'update_di_master_data' => 'nullable|integer',
            'kendala' => 'nullable|string|max:255',
            'tindak_lanjut' => 'nullable|string|max:255',
        ];
    }
}
