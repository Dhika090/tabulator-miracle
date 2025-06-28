<?php

namespace App\Http\Controllers\SHG\InputDataMonev\SakaEnergi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\SakaEnergi\StatusAssetAiSakaRequest;
use App\Models\SHG\SakaEnergi\StatusAssetAiSaka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiSakaController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiSaka::all();
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
                'title' => 'Status Asset 2025 AI SAKA',
                'route' => route('saka-energi-indonesia'),
                'active' => request()->routeIs('saka-energi-indonesia'),
            ],
            [
                'title' => 'Asset Breakdown Saka',
                'route' => route('asset-breakdown-saka'),
                'active' => request()->routeIs('asset-breakdown-saka'),
            ],
            [
                'title' => 'Status PLO Saka',
                'route' => route('status-plo-saka'),
                'active' => request()->routeIs('status-plo-saka'),
            ],
            [
                'title' => 'Mandatory Certification Saka',
                'route' => route('mandatory-certification-saka'),
                'active' => request()->routeIs('mandatory-certification-saka'),
            ],
            [
                'title' => 'Kondisi Vacant Aims Saka',
                'route' => route('kondisi-vacant-aims-saka'),
                'active' => request()->routeIs('kondisi-vacant-aims-saka'),
            ],
            [
                'title' => 'Pelatihan Aims Saka',
                'route' => route('pelatihan-aims-saka'),
                'active' => request()->routeIs('pelatihan-aims-saka'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Besar Saka',
                'route' => route('rencana-pemeliharaan-saka'),
                'active' => request()->routeIs('rencana-pemeliharaan-saka'),
            ],
            [
                'title' => 'Sistem Informasi Aims Saka',
                'route' => route('sistem-informasi-aims-saka'),
                'active' => request()->routeIs('sistem-informasi-aims-saka'),
            ],
            [
                'title' => 'Availability Saka',
                'route' => route('availability-saka'),
                'active' => request()->routeIs('availability-saka'),
            ],
            [
                'title' => 'Air Budget Tagging Saka',
                'route' => route('air-budget-tagging-saka'),
                'active' => request()->routeIs('air-budget-tagging-saka'),
            ],
            [
                'title' => 'Realisasi Anggaran AI Saka',
                'route' => route('realisasi-anggaran-ai-saka'),
                'active' => request()->routeIs('realisasi-anggaran-ai-saka'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI Saka',
                'route' => route('realisasi-progress-fisik-ai-saka'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-saka'),
            ],
        ];

        return view('SHG.InputDataMonev.SakaEnergi.StatusAssetAiSaka', compact('tabs', 'companies'));
    }


    public function data()
    {
        $TargetPLO = StatusAssetAiSaka::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(StatusAssetAiSakaRequest $request)
    {
        $data = $request->validated();
        $data = StatusAssetAiSaka::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(StatusAssetAiSakaRequest $request, $id)
    {
        $progress = StatusAssetAiSaka::findOrFail($id);

        $data = $request->validated();

        $intFields = [
            'jumlah',

            'sece_low_breakdown',
            'sece_medium_due_date_inspection',
            'sece_medium_low_condition',
            'sece_medium_low_performance',
            'sece_high',

            'pce_low_breakdown',
            'pce_medium_due_date_inspection',
            'pce_medium_low_condition',
            'pce_medium_low_performance',
            'pce_high',

            'important_low_breakdown',
            'important_medium_due_date_inspection',
            'important_medium_low_condition',
            'important_medium_low_performance',
            'important_high',

            'secondary_low_breakdown',
            'secondary_medium_due_date_inspection',
            'secondary_medium_low_condition',
            'secondary_medium_low_performance',
            'secondary_high',

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
        $target = StatusAssetAiSaka::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
