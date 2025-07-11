<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PertagasNiaga\StatusAssetAiPTGNRequest;
use App\Models\SHG\PertagasNiaga\StatusAssetAiPTGN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiPTGNController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiPTGN::all();
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
                'title' => 'Status Asset 2025 AI PTGN',
                'route' => route('pertagas-niaga'),
                'active' => request()->routeIs('pertagas-niaga'),
            ],
            [
                'title' => 'Mandatory Certification PTGN',
                'route' => route('mandatory-certification-ptgn'),
                'active' => request()->routeIs('mandatory-certification-ptgn'),
            ],
            [
                'title' => 'Asset Breakdown PTGN',
                'route' => route('asset-breakdown-ptgn'),
                'active' => request()->routeIs('asset-breakdown-ptgn'),
            ],
            [
                'title' => 'Status PLO PTGN',
                'route' => route('status-plo-ptgn'),
                'active' => request()->routeIs('status-plo-ptgn'),
            ],
            [
                'title' => 'Kondisi Vacant Aims PTGN',
                'route' => route('kondisi-vacant-fungsi-aims-ptgn'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-ptgn'),
            ],
            [
                'title' => 'Sistem Informasi Aims PTGN',
                'route' => route('sistem-informasi-aims-ptgn'),
                'active' => request()->routeIs('sistem-informasi-aims-ptgn'),
            ],
            [
                'title' => 'Pelatihan Aims PTGN',
                'route' => route('pelatihan-aims-ptgn'),
                'active' => request()->routeIs('pelatihan-aims-ptgn'),
            ],
            [
                'title' => 'Rencana Pemeliharaan PTGN',
                'route' => route('rencana-pemeliharaan-ptgn'),
                'active' => request()->routeIs('rencana-pemeliharaan-ptgn'),
            ],
            [
                'title' => 'Availability PTGN',
                'route' => route('availability-ptgn'),
                'active' => request()->routeIs('availability-ptgn'),
            ],
            [
                'title' => 'Air Budget Tagging PTGN',
                'route' => route('air-budget-tagging-ptgn'),
                'active' => request()->routeIs('air-budget-tagging-ptgn'),
            ],
            [
                'title' => 'Realisasi Anggaran AI PTGN',
                'route' => route('realisasi-anggaran-ai-ptgn'),
                'active' => request()->routeIs('realisasi-anggaran-ai-ptgn'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PTGN',
                'route' => route('realisasi-progress-fisik-ai-ptgn'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-ptgn'),
            ],
        ];

        return view('SHG.InputDataMonev.pertagasNiaga.pertagasNiaga', compact('tabs', 'companies'));
    }

    public function data()
    {
        $TargetPLO = StatusAssetAiPTGN::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }


    public function store(StatusAssetAiPTGNRequest $request)
    {
        $data = $request->validated();
        $data = StatusAssetAiPTGN::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(StatusAssetAiPTGNRequest $request, $id)
    {
        $progress = StatusAssetAiPTGN::findOrFail($id);

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
        $target = StatusAssetAiPTGN::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
