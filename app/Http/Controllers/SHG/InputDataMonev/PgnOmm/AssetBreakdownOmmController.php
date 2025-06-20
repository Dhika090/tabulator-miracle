<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PgnOmm;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PgnOmm\AssetBreakdownOmmRequest;
use App\Models\SHG\PgnOmm\AssetBreakdownOmm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetBreakdownOmmController extends Controller
{
    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI OMM',
                'route' => route('pgn-omm'),
                'active' => request()->routeIs('pgn-omm'),
            ],
            [
                'title' => 'Mandatory Certification OMM',
                'route' => route('mandatory-certification-omm'),
                'active' => request()->routeIs('mandatory-certification-omm'),
            ],
            [
                'title' => 'Asset Breakdown OMM',
                'route' => route('asset-breakdown-omm'),
                'active' => request()->routeIs('asset-breakdown-omm'),
            ],
            [
                'title' => 'Status PLO OMM',
                'route' => route('status-plo-omm'),
                'active' => request()->routeIs('status-plo-omm'),
            ],
            [
                'title' => 'Kondisi Vacant Fungsi AIMS OMM',
                'route' => route('kondisi-vacant-aims-omm'),
                'active' => request()->routeIs('kondisi-vacant-aims-omm'),
            ],
            [
                'title' => 'SAP Asset OMM',
                'route' => route('sap-asset-omm'),
                'active' => request()->routeIs('sap-asset-omm'),
            ],
            [
                'title' => 'Realisasi Anggaran AI OMM',
                'route' => route('realisasi-anggaran-ai-omm'),
                'active' => request()->routeIs('realisasi-anggaran-ai-omm'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI OMM',
                'route' => route('realisasi-progress-fisik-ai-omm'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-omm'),
            ],
            [
                'title' => 'Pelatihan AIMS OMM',
                'route' => route('pelatihan-aims-omm'),
                'active' => request()->routeIs('pelatihan-aims-omm'),
            ],
            [
                'title' => 'Sistem Informasi AIMS OMM',
                'route' => route('sistem-informasi-aims-omm'),
                'active' => request()->routeIs('sistem-informasi-aims-omm'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Besar OMM',
                'route' => route('rencana-pemeliharaan-omm'),
                'active' => request()->routeIs('rencana-pemeliharaan-omm'),
            ],
            [
                'title' => 'Reliability OMM',
                'route' => route('reliability-omm'),
                'active' => request()->routeIs('reliability-omm'),
            ],
            [
                'title' => 'Availability OMM',
                'route' => route('availability-omm'),
                'active' => request()->routeIs('availability-omm'),
            ],
            [
                'title' => 'Air Budget Tagging OMM',
                'route' => route('air-budget-tagging-omm'),
                'active' => request()->routeIs('air-budget-tagging-omm'),
            ],
        ];

        return view('SHG.InputDataMonev.PgnOmm.AssetBreakdownOMM', compact('tabs'));
    }

    public function store(AssetBreakdownOmmRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = AssetBreakdownOmm::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = AssetBreakdownOmm::select('*')
             ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }
    public function update(AssetBreakdownOmmRequest $request, $id)
    {
        $progress = AssetBreakdownOmm::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = AssetBreakdownOmm::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
