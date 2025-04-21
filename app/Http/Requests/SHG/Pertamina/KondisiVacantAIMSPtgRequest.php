<?php

namespace App\Http\Requests\SHG\Pertamina;

use Illuminate\Foundation\Http\FormRequest;

class KondisiVacantAIMSPtgRequest extends FormRequest
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
            'total_personil_asset_integrity' => 'nullable|integer',
            'jumlah_personil_vacant' => 'nullable|integer',
            'jumlah_personil_pensiun' => 'nullable|integer',
            'keterangan' => 'nullable|string',
        ];
    }
}
