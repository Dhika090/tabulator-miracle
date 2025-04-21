<?php

namespace App\Http\Requests\SHG\Pertamina;

use Illuminate\Foundation\Http\FormRequest;

class SapAssetPtgRequest extends FormRequest
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
            'subholding' => 'required|string',
            'company' => 'required|string',
            'unit' => 'required|string',
            'nama_stasiun' => 'required|string',
            'belum_mulai' => 'nullable|integer',
            'kickoff_meeting' => 'nullable|integer',
            'identifikasi_peralatan' => 'nullable|integer',
            'survey_lapangan' => 'nullable|integer',
            'pembenahan_funloc' => 'nullable|integer',
            'review_criticality' => 'nullable|integer',
            'penyelarasan_dokumen' => 'nullable|integer',
            'melengkapi_tag_fisik' => 'nullable|integer',
            'form_upload_data' => 'nullable|integer',
            'request_master_data' => 'nullable|integer',
            'update_master_data' => 'nullable|integer',
            'kendala' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ];
    }
}
