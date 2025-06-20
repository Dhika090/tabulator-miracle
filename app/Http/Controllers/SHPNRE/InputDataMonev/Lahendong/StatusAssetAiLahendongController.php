<?php

namespace App\Http\Controllers\SHPNRE\InputDataMonev\Lahendong;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\Lahendong\StatusAssetAiLahendongRequest;
use App\Models\SHPNRE\Lahendong\SistemInformasiAimsLahendong;
use App\Models\SHPNRE\Lahendong\StatusAssetAiLahendong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiLahendongController extends Controller
{


    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiLahendong::all();
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
                'title' => 'Status Asset 2025 AI Lahendong',
                'route' => route('lahendong'),
                'active' => request()->routeIs('lahendong'),
            ],
            [
                'title' => 'Asset Breakdown Lumut Balai',
                'route' => route('asset-breakdown-lahendong'),
                'active' => request()->routeIs('asset-breakdown-lahendong'),
            ],
            [
                'title' => 'Availability Lahendong',
                'route' => route('availability-lahendong'),
                'active' => request()->routeIs('availability-lahendong'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims Lahendong',
                'route' => route('kondisi-vacant-aims-lahendong'),
                'active' => request()->routeIs('kondisi-vacant-aims-lahendong'),
            ],
            [
                'title' => 'Mandatory Certification Aims Lumut Balai',
                'route' => route('mandatory-certification-lahendong'),
                'active' => request()->routeIs('mandatory-certification-lahendong'),
            ],
            [
                'title' => 'Pelatihan Aims Lahendong',
                'route' => route('pelatihan-aims-lahendong'),
                'active' => request()->routeIs('pelatihan-aims-lahendong'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Lahendong',
                'route' => route('rencana-pemeliharaan-lahendong'),
                'active' => request()->routeIs('rencana-pemeliharaan-lahendong'),
            ],
            [
                'title' => 'Real Anggaran AI Lahendong',
                'route' => route('real-anggaran-ai-lahendong'),
                'active' => request()->routeIs('real-anggaran-ai-lahendong'),
            ],
            [
                'title' => 'Real Anggaran Figure Lahendong',
                'route' => route('real-anggaran-figure-lahendong'),
                'active' => request()->routeIs('real-anggaran-figure-lahendong'),
            ],
            [
                'title' => 'Realisasi Prog Fisik Lahendong',
                'route' => route('realisasi-prog-fisik-lahendong'),
                'active' => request()->routeIs('realisasi-prog-fisik-lahendong'),
            ],
            [
                'title' => 'Sistem Informasi Aims Lahendong',
                'route' => route('sistem-informasi-aims-lahendong'),
                'active' => request()->routeIs('sistem-informasi-aims-lahendong'),
            ],
            [
                'title' => 'Summary PLO Lahendong',
                'route' => route('summary-plo-lahendong'),
                'active' => request()->routeIs('summary-plo-lahendong'),
            ]
        ];
        return view('SHPNRE.InputDataMonev.Lahendong.StatusAssetAiLahendong', compact('tabs', 'companies'));
    }

    public function store(StatusAssetAiLahendongRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = SistemInformasiAimsLahendong::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = StatusAssetAiLahendong::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(StatusAssetAiLahendongRequest $request, $id)
    {
        $progress = StatusAssetAiLahendong::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = StatusAssetAiLahendong::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
