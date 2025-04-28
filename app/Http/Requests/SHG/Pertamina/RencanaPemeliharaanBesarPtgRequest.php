<?php

namespace App\Http\Requests\SHG\Pertamina;

use Illuminate\Foundation\Http\FormRequest;

class RencanaPemeliharaanBesarPtgRequest extends FormRequest
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
            'no'=> 'required|integer',
            'company' => 'required|string',
            'lokasi' => 'required|string',
            'program_kerja' => 'required|string|max:550',
            'kategori_maintenance' => 'required|string',
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
            'biaya_kerugian' => 'nullable|numeric',
            'keterangan_kerugian' => 'nullable|string',
            'penyebab' => 'nullable|string',
            'kendala' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',

        ];
    }
}
