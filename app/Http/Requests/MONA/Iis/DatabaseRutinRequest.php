<?php

namespace App\Http\Requests\MONA\Iis;

use Illuminate\Foundation\Http\FormRequest;

class DatabaseRutinRequest extends FormRequest
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
            'no' => 'nullable|numeric',
            'aktifitas' => 'nullable|string',
            'interval' => 'nullable|string',
            'pic' => 'nullable|string',
            'plan_jan' => 'nullable|numeric',
            'target_jan' => 'nullable|numeric',
            'actual_jan' => 'nullable|numeric',
            'plan_feb' => 'nullable|numeric',
            'target_feb' => 'nullable|numeric',
            'actual_feb' => 'nullable|numeric',
            'plan_mar' => 'nullable|numeric',
            'target_mar' => 'nullable|numeric',
            'actual_mar' => 'nullable|numeric',
            'plan_apr' => 'nullable|numeric',
            'target_apr' => 'nullable|numeric',
            'actual_apr' => 'nullable|numeric',
            'plan_may' => 'nullable|numeric',
            'target_may' => 'nullable|numeric',
            'actual_may' => 'nullable|numeric',
            'plan_jun' => 'nullable|numeric',
            'target_jun' => 'nullable|numeric',
            'actual_jun' => 'nullable|numeric',
            'plan_jul' => 'nullable|numeric',
            'target_jul' => 'nullable|numeric',
            'actual_jul' => 'nullable|numeric',
            'plan_aug' => 'nullable|numeric',
            'target_aug' => 'nullable|numeric',
            'actual_aug' => 'nullable|numeric',
            'plan_sep' => 'nullable|numeric',
            'target_sep' => 'nullable|numeric',
            'actual_sep' => 'nullable|numeric',
            'plan_oct' => 'nullable|numeric',
            'target_oct' => 'nullable|numeric',
            'actual_oct' => 'nullable|numeric',
            'plan_nov' => 'nullable|numeric',
            'target_nov' => 'nullable|numeric',
            'actual_nov' => 'nullable|numeric',
            'plan_dec' => 'nullable|numeric',
            'target_dec' => 'nullable|numeric',
            'actual_dec' => 'nullable|numeric',
            'tindak_lanjut' => 'nullable|string|max:550',
            'nama_dokumen' => 'nullable|string',
            'nomor_dokumen' => 'nullable|string',
            'link_storage_dokumen' => 'nullable|string|max:550',
            'keterangan' => 'nullable|string',
        ];
    }
}
