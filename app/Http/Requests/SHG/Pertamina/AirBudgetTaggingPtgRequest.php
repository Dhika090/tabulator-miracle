<?php

namespace App\Http\Requests\SHG\Pertamina;

use Illuminate\Foundation\Http\FormRequest;

class AirBudgetTaggingPtgRequest extends FormRequest
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
            'satker' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'ce' => 'nullable|string|max:255',
            'cost_element_name' => 'nullable|string|max:255',
            'program_kerja' => 'required|string|max:255',
            'total_pagu_usd' => 'nullable|numeric',
            'jan' => 'nullable|numeric',
            'feb' => 'nullable|numeric',
            'mar' => 'nullable|numeric',
            'apr' => 'nullable|numeric',
            'may' => 'nullable|numeric',
            'jun' => 'nullable|numeric',
            'jul' => 'nullable|numeric',
            'aug' => 'nullable|numeric',
            'sep' => 'nullable|numeric',
            'oct' => 'nullable|numeric',
            'nov' => 'nullable|numeric',
            'dec' => 'nullable|numeric',
            'aset_integrity' => 'nullable|in:Yes,No',
            'airtagging' => 'nullable|string|max:255',
            'prioritas' => 'nullable|string|max:255',
            'status_integrity' => 'nullable|string|max:255',
            'jumlah_aset_critical_sece' => 'nullable|integer',
            'jumlah_aset_critical_pce' => 'nullable|integer',
            'jumlah_aset_important' => 'nullable|integer',
            'jumlah_aset_secondary' => 'nullable|integer',
        ];
    }
}
