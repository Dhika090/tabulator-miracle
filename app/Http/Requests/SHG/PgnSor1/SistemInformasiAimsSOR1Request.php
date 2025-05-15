<?php

namespace App\Http\Requests\SHG\PgnSor1;

use Illuminate\Foundation\Http\FormRequest;

class SistemInformasiAimsSOR1Request extends FormRequest
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
            'jumlah_aset_operasi' => 'nullable|string',
            'jumlah_aset_teregister' => 'nullable|string',
            'kendala_aset_register' => 'nullable|string',
            'tindak_lanjut_aset_register' => 'nullable|string',
            'sistem_informasi_aim' => 'nullable|string',
            'total_wo_comply' => 'nullable|string',
            'total_wo_completed' => 'nullable|string',
            'total_wo_in_progress' => 'nullable|string',
            'total_wo_backlog' => 'nullable|string',
            'kendala' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ];

    }
    public function prepareForValidation()
    {
        $fields = [
            'total_wo_comply',
            'total_wo_completed',
            'total_wo_in_progress',
            'total_wo_backlog'
        ];

        foreach ($fields as $field) {
            if ($this->has($field)) {
                $clean = str_replace([',', '.'], '', $this->{$field});

                $this->merge([
                    $field => $clean,
                ]);
            }
        }
    }


}
