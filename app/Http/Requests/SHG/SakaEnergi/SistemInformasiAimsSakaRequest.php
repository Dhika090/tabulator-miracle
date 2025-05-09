<?php

namespace App\Http\Requests\SHG\SakaEnergi;

use Illuminate\Foundation\Http\FormRequest;

class SistemInformasiAimsSakaRequest extends FormRequest
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
            'company' => 'nullable|string',
            'jumlah_aset_operasi' => 'nullable|string',
            'jumlah_aset_teregister' => 'nullable|string',
            'kendala_aset_register' => 'nullable|string',
            'tindak_lanjut_aset_register' => 'nullable|string',
            'sistem_informasi_aim' => 'nullable|string',
            'total_wo_comply' => 'nullable|integer',
            'total_wo_completed' => 'nullable|integer',
            'total_wo_in_progress' => 'nullable|integer',
            'total_wo_backlog' => 'nullable|integer',
            'kendala' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ];
    }
}
