<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PgnSor1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PgnSor1\ReliabilitySOR1Request;
use App\Models\SHG\PgnSor1\ReliabilitySOR1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReliabilitySOR1Controller extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI PGN SOR 1',
                'route' => route('pgn-sor1'),
                'active' => request()->routeIs('pgn-sor1'),
            ],
            [
                'title' => 'Mandatory Certification SOR 1',
                'route' => route('mandatory-certification-sor1'),
                'active' => request()->routeIs('mandatory-certification-sor1'),
            ],
            [
                'title' => 'Asset Breakdown SOR 1',
                'route' => route('asset-breakdown-sor1'),
                'active' => request()->routeIs('asset-breakdown-sor1'),
            ],
            [
                'title' => 'Status PLO SOR 1',
                'route' => route('status-plo-sor1'),
                'active' => request()->routeIs('status-plo-sor1'),
            ],
            [
                'title' => 'Kondisi Vacant Fungsi AIMS SOR 1',
                'route' => route('kondisi-vacant-fungsi-aims-sor1'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-sor1'),
            ],
            [
                'title' => 'Rencana Pemeliharaan SOR 1',
                'route' => route('rencana-pemeliharaan-sor1'),
                'active' => request()->routeIs('rencana-pemeliharaan-sor1'),
            ],
            [
                'title' => 'Sistem Informasi AIMS SOR 1',
                'route' => route('sistem-informasi-aims-sor1'),
                'active' => request()->routeIs('sistem-informasi-aims-sor1'),
            ],
            [
                'title' => 'Pelatihan AIMS SOR 1',
                'route' => route('pelatihan-aims-sor1'),
                'active' => request()->routeIs('pelatihan-aims-sor1'),
            ],
            [
                'title' => 'Realisasi Anggaran AI SOR 1',
                'route' => route('realisasi-anggaran-ai-sor1'),
                'active' => request()->routeIs('realisasi-anggaran-ai-sor1'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI SOR 1',
                'route' => route('realisasi-progress-fisik-ai-sor1'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-sor1'),
            ],
            [
                'title' => 'Availability SOR 1',
                'route' => route('availability-sor1'),
                'active' => request()->routeIs('availability-sor1'),
            ],
            [
                'title' => 'Reliability SOR 1',
                'route' => route('reliability-sor1'),
                'active' => request()->routeIs('reliability-sor1'),
            ],
            [
                'title' => 'Air Budget Tagging SOR 1',
                'route' => route('air-budget-tagging-sor1'),
                'active' => request()->routeIs('air-budget-tagging-sor1'),
            ],

        ];

        return view('SHG.InputDataMonev.PgnSor1.ReliabilitySOR1', compact('tabs'));
    }

    public function store(ReliabilitySOR1Request $request)
    {
        $validated = $request->validated();
        $TargetPLO = ReliabilitySOR1::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = ReliabilitySOR1::select('*')
            ->addSelect(DB::raw("
            STR_TO_DATE(CONCAT('01-', periode), '%d-%b-%Y') as periode_date
        "))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(ReliabilitySOR1Request $request, $id)
    {
        $progress = ReliabilitySOR1::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = ReliabilitySOR1::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
