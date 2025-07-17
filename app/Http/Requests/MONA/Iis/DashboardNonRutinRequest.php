<?php

namespace App\Http\Requests\Mona\Iis;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class DashboardNonRutinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'tanggal_Mulai' => $this->formatTanggal($this->input('tanggal_Mulai')),
            'target_penyelesaian' => $this->formatTanggal($this->input('target_penyelesaian')),
            'realisasi_penyelesaian' => $this->formatTanggal($this->input('realisasi_penyelesaian')),
        ]);
    }

    private function formatTanggal($value)
    {
        if (!$value)
            return null;

        try {
            $cleaned = preg_replace('/\s+/', '', $value);
            return Carbon::parse($cleaned)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
    public function rules(): array
    {
        return [
            'aktifitas' => 'nullable|string',
            'tanggal_Mulai' => 'nullable|date',
            'target_penyelesaian' => 'nullable|date',
            'realisasi_penyelesaian' => 'nullable|date',
            'status' => 'nullable|string',
            'pic' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string|max:550',
            'nama_dokumen' => 'nullable|string',
            'nomor_dokumen' => 'nullable|string',
            'link_storage_dokumen' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ];
    }
}
