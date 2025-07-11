<?php

namespace App\Http\Requests\SHCNT\KondisiVacantAims;

use Illuminate\Foundation\Http\FormRequest;

class Region6KondisiVacantAimsRequest extends FormRequest
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
            'total_personil_asset_integrity' => 'nullable|integer',
            'jumlah_personil_vacant' => 'nullable|integer',
            'jumlah_personil_pensiun' => 'nullable|integer',
            'keterangan' => 'nullable|string|max:10000',
        ];
    }
}
