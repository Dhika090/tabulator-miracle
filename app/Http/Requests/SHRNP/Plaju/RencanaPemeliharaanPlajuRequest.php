<?php

namespace App\Http\Requests\SHRNP\Plaju;

use Illuminate\Foundation\Http\FormRequest;

class RencanaPemeliharaanPlajuRequest extends FormRequest
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
            'no' => 'nullable|integer',
            'company' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'program_kerja' => 'nullable|string',
            'kategori_maintenance' => 'nullable|string',
            'besar_phasing' => 'nullable|string',
            'remark' => 'nullable|string',
            'jan' => 'nullable|integer',
            'feb' => 'nullable|integer',
            'mar' => 'nullable|integer',
            'apr' => 'nullable|integer',
            'may' => 'nullable|integer',
            'jun' => 'nullable|integer',
            'jul' => 'nullable|integer',
            'aug' => 'nullable|integer',
            'sep' => 'nullable|integer',
            'oct' => 'nullable|integer',
            'nov' => 'nullable|integer',
            'dec' => 'nullable|integer',
            'biaya_kerugian' => 'nullable|string',
            'keterangan_kerugian' => 'nullable|string',
            'penyebab' => 'nullable|string',
            'kendala' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ];
    }
}
