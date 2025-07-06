<?php

namespace App\Http\Requests\SHRNP\Kasim;

use Illuminate\Foundation\Http\FormRequest;

class SapAssetKasimRequest extends FormRequest
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
            'nama_stasiun' => 'nullable|string',
            'belum_mulai' => 'nullable|string',
            'kickoff_meeting' => 'nullable|string',
            'identifikasi_peralatan' => 'nullable|string',
            'survey_lapangan' => 'nullable|string',
            'pembenahan_funloc' => 'nullable|string',
            'review_criticality' => 'nullable|string',
            'penyelarasan_dokumen' => 'nullable|string',
            'melengkapi_tag_fisik' => 'nullable|string',
            'form_upload_data' => 'nullable|string',
            'request_master_data' => 'nullable|string',
            'update_master_data' => 'nullable|string',
            'kendala' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ];
    }
}
