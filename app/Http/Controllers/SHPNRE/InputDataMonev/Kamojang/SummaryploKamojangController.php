<?php

namespace App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\Kamojang\SummaryPloKamojangRequest;
use App\Models\SHPNRE\Kamojang\SummaryPloKamojang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SummaryploKamojangController extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI Kamojang',
                'route' => route('kamojang'),
                'active' => request()->routeIs('kamojang'),
            ],
            [
                'title' => 'Asset Breakdown Kamojang',
                'route' => route('asset-breakdown-kamojang'),
                'active' => request()->routeIs('asset-breakdown-kamojang'),
            ],
            [
                'title' => 'Availability Kamojang',
                'route' => route('availability-kamojang'),
                'active' => request()->routeIs('availability-kamojang'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims Kamojang',
                'route' => route('kondisi-vacant-aims-kamojang'),
                'active' => request()->routeIs('kondisi-vacant-aims-kamojang'),
            ],
            [
                'title' => 'Mandatory Certification Aims Lumut Balai',
                'route' => route('mandatory-certification-kamojang'),
                'active' => request()->routeIs('mandatory-certification-kamojang'),
            ],
            [
                'title' => 'Pelatihan Aims Kamojang',
                'route' => route('pelatihan-aims-kamojang'),
                'active' => request()->routeIs('pelatihan-aims-kamojang'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Kamojang',
                'route' => route('rencana-pemeliharaan-kamojang'),
                'active' => request()->routeIs('rencana-pemeliharaan-kamojang'),
            ],
            [
                'title' => 'Real Anggaran AI Kamojang',
                'route' => route('real-anggaran-ai-kamojang'),
                'active' => request()->routeIs('real-anggaran-ai-kamojang'),
            ],
            [
                'title' => 'Real Anggaran Figure Kamojang',
                'route' => route('real-anggaran-figure-kamojang'),
                'active' => request()->routeIs('real-anggaran-figure-kamojang'),
            ],
            [
                'title' => 'Realisasi Prog Fisik Kamojang',
                'route' => route('real-prog-fisik-kamojang'),
                'active' => request()->routeIs('real-prog-fisik-kamojang'),
            ],
            [
                'title' => 'Sistem Informasi Aims Kamojang',
                'route' => route('sistem-informasi-aims-kamojang'),
                'active' => request()->routeIs('sistem-informasi-aims-kamojang'),
            ],
            [
                'title' => 'Summary PLO Kamojang',
                'route' => route('summary-plo-kamojang'),
                'active' => request()->routeIs('summary-plo-kamojang'),
            ],
            [
                'title' => 'SAP Asset Kamojang',
                'route' => route('sap-asset-kamojang'),
                'active' => request()->routeIs('sap-asset-kamojang'),
            ]
        ];
        return view('SHPNRE.InputDataMonev.Kamojang.SummaryPloKamojang', compact('tabs'));
    }

    public function store(SummaryPloKamojangRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = SummaryPloKamojang::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = SummaryPloKamojang::select('*')
            ->addSelect(DB::raw("
            STR_TO_DATE(CONCAT('01-', periode), '%d-%b-%Y') as periode_date
        "))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(SummaryPloKamojangRequest $request, $id)
    {
        $progress = SummaryPloKamojang::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = SummaryPloKamojang::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }

}
