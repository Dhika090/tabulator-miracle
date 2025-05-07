<?php

namespace App\Http\Requests\SHG\PertagasNiaga;

use Illuminate\Foundation\Http\FormRequest;

class AirBudgetTaggingPTGNRequest extends FormRequest
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
            'periode' => 'required|string|max:255',
            'satker' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'ce' => 'nullable|string|max:255',
            'cost_element_name' => 'nullable|string|max:255',
            'program_kerja' => 'nullable|string|max:255',
            'total_pagu_usd' => 'nullable|string',
            'jan' => 'nullable|string',
            'feb' => 'nullable|string',
            'mar' => 'nullable|string',
            'apr' => 'nullable|string',
            'may' => 'nullable|string',
            'jun' => 'nullable|string',
            'jul' => 'nullable|string',
            'aug' => 'nullable|string',
            'sep' => 'nullable|string',
            'oct' => 'nullable|string',
            'nov' => 'nullable|string',
            'dec' => 'nullable|string',
            'aset_integrity' => 'nullable|in:Yes,No,yes,no',
            'airtagging' => 'nullable|string|max:255',
            'prioritas' => 'nullable|string|max:255',
            'status_integrity' => 'nullable|string|max:255',
            'jumlah_aset_critical_sece' => 'nullable|string',
            'jumlah_aset_critical_pce' => 'nullable|string',
            'jumlah_aset_important' => 'nullable|string',
            'jumlah_aset_secondary' => 'nullable|string',
        ];
    }
}
