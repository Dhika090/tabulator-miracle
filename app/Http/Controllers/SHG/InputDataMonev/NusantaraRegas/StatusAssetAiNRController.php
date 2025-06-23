<?php

namespace App\Http\Controllers\SHG\InputDataMonev\NusantaraRegas;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\NusantaraRegas\StatusAssetAiNRRequest;
use App\Models\SHG\NusantaraRegas\StatusAssetAiNR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiNRController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiNR::all();
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
                'title' => 'Status Asset 2025 AI NR',
                'route' => route('nusantara-regas'),
                'active' => request()->routeIs('nusantara-regas'),
            ],
            [
                'title' => 'Mandatory Certification NR',
                'route' => route('mandatory-certification-nr'),
                'active' => request()->routeIs('mandatory-certification-nr'),
            ],
            [
                'title' => 'Asset Breakdown NR',
                'route' => route('asset-breakdown-nr'),
                'active' => request()->routeIs('asset-breakdown-nr'),
            ],
            [
                'title' => 'Status PLO NR',
                'route' => route('status-plo-nr'),
                'active' => request()->routeIs('status-plo-nr'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims NR',
                'route' => route('kondisi-vacant-fungsi-aims-nr'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-nr'),
            ],
            [
                'title' => 'Pelatihan Aims NR',
                'route' => route('pelatihan-aims-nr'),
                'active' => request()->routeIs('pelatihan-aims-nr'),
            ],
            [
                'title' => 'Rencana Pemeliharaan NR',
                'route' => route('rencana-pemeliharaan-nr'),
                'active' => request()->routeIs('rencana-pemeliharaan-nr'),
            ],
            [
                'title' => 'Sistem Informasi Aims NR',
                'route' => route('sistem-informasi-aims-nr'),
                'active' => request()->routeIs('sistem-informasi-aims-nr'),
            ],
            [
                'title' => 'Availability NR',
                'route' => route('availability-nr'),
                'active' => request()->routeIs('availability-nr'),
            ],
            [
                'title' => 'Air Budget Tagging NR',
                'route' => route('air-budget-tagging-nr'),
                'active' => request()->routeIs('air-budget-tagging-nr'),
            ],

        ];

        return view('SHG.InputDataMonev.NusantaraRegas.StatusAssetAiNR', compact('tabs', 'companies'));
    }


    public function data()
    {
        $TargetPLO = StatusAssetAiNR::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }

    public function store(StatusAssetAiNRRequest $request)
    {
        $data = $request->validated();
        $data = StatusAssetAiNR::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(StatusAssetAiNRRequest $request, $id)
    {
        $progress = StatusAssetAiNR::findOrFail($id);

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
        $target = StatusAssetAiNR::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
