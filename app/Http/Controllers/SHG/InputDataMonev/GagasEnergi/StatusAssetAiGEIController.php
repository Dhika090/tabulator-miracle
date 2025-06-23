<?php

namespace App\Http\Controllers\SHG\InputDataMonev\GagasEnergi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\GagasEnergi\StatusAssetAiGEIRequest;
use App\Models\SHG\GagasEnergi\StatusAssetAiGEI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiGEIController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiGEI::all();
            return response()->json($TargetPLO);
        }

        $companies = [
            'PGN',
            'PTG',
            'PTGN',
            'PTSG',
            'PGN, PAG, SAKA, WMP',
            'GEI',
            'TGI',
            'WMN',
            'PLI',
            'PDG',
            'KJG',
            'PAG',
            'NR'
        ];

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI GEI',
                'route' => route('gagas-energi-indonesia'),
                'active' => request()->routeIs('gagas-energi-indonesia'),
            ],
            [
                'title' => 'Mandatory Certification GEI',
                'route' => route('mandatory-certification-gei'),
                'active' => request()->routeIs('mandatory-certification-gei'),
            ],
            [
                'title' => 'Asset Breakdown GEI',
                'route' => route('asset-breakdown-gei'),
                'active' => request()->routeIs('asset-breakdown-gei'),
            ],
            [
                'title' => 'Sistem Informasi AIMS GEI',
                'route' => route('sistem-informasi-aims-gei'),
                'active' => request()->routeIs('sistem-informasi-aims-gei'),
            ],
            [
                'title' => 'Kondisi Vacant Fungsi AIMS GEI',
                'route' => route('kondisi-vacant-fungsi-aims-gei'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-gei'),
            ],
            [
                'title' => 'Status PLO GEI',
                'route' => route('status-plo-gei'),
                'active' => request()->routeIs('status-plo-gei'),
            ],
            [
                'title' => 'Pelatihan AIMS GEI',
                'route' => route('pelatihan-aims-gei'),
                'active' => request()->routeIs('pelatihan-aims-gei'),
            ],
            [
                'title' => 'Availability GEI',
                'route' => route('availability-gei'),
                'active' => request()->routeIs('availability-gei'),
            ],
            [
                'title' => 'Realisasi Anggaran AI GEI',
                'route' => route('realisasi-anggaran-ai-gei'),
                'active' => request()->routeIs('realisasi-anggaran-ai-gei'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI GEI',
                'route' => route('realisasi-progress-fisik-ai-gei'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-gei'),
            ],
            [
                'title' => 'Rencana Pemeliharaan GEI',
                'route' => route('rencana-pemeliharaan-gei'),
                'active' => request()->routeIs('rencana-pemeliharaan-gei'),
            ],
            [
                'title' => 'Air Budget Tagging GEI',
                'route' => route('air-budget-tagging-gei'),
                'active' => request()->routeIs('air-budget-tagging-gei'),
            ],
        ];

        return view('SHG.InputDataMonev.gagasEnergi.StatusAssetAiGEI', compact('tabs', 'companies'));
    }


    public function data()
    {
        $TargetPLO = StatusAssetAiGEI::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }


    public function store(StatusAssetAiGEIRequest $request)
    {
        $data = $request->validated();
        $data = StatusAssetAiGEI::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(StatusAssetAiGEIRequest $request, $id)
    {
        $progress = StatusAssetAiGEI::findOrFail($id);

        $data = $request->validated();

        $intFields = [
            'jumlah',

            'sece_low_integrity_breakdown',
            'sece_medium_due_date_inspection',
            'sece_medium_low_condition',
            'sece_medium_low_performance',
            'sece_high_integrity',

            'pce_low_integrity_breakdown',
            'pce_medium_due_date_inspection',
            'pce_medium_low_condition',
            'pce_medium_low_performance',
            'pce_high_integrity',

            'important_low_integrity_breakdown',
            'important_medium_due_date_inspection',
            'important_medium_low_condition',
            'important_medium_low_performance',
            'important_high_integrity',

            'secondary_low_integrity_breakdown',
            'secondary_medium_due_date_inspection',
            'secondary_medium_low_condition',
            'secondary_medium_low_performance',
            'secondary_high_integrity',

            'kegiatan_penurunan_low',
            'kegiatan_penurunan_med',
        ];

        foreach ($intFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = (int) $data[$field];
            }
        }
        $progress->update($data);

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = StatusAssetAiGEI::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
