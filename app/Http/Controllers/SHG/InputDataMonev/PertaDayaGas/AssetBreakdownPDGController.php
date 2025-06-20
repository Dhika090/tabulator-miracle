<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertadaya\AssetBreakdownPDGRequest;
use App\Models\SHG\PertaDaya\AssetBreakdownPDG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetBreakdownPDGController extends Controller
{

    public function index()
    {
        $tabs = [
            [
                'title' => 'Status Asset 2025 AI PDG',
                'route' => route('perta-daya-gas'),
                'active' => request()->routeIs('perta-daya-gas'),
            ],
            [
                'title' => 'Mandatory Certification PDG',
                'route' => route('mandatory-certification-pdg'),
                'active' => request()->routeIs('mandatory-certification-pdg'),
            ],
            [
                'title' => 'Status PLO PDG',
                'route' => route('status-plo-pdg'),
                'active' => request()->routeIs('status-plo-pdg'),
            ],
            [
                'title' => 'Asset Breakdown PDG',
                'route' => route('asset-breakdown-pdg'),
                'active' => request()->routeIs('asset-breakdown-pdg'),
            ],
            [
                'title' => 'Pelatihan AIMS PDG',
                'route' => route('pelatihan-aims-pdg'),
                'active' => request()->routeIs('pelatihan-aims-pdg'),
            ],
            [
                'title' => 'Kondisi Vacant Aims PDG',
                'route' => route('kondisi-vacant-aims-pdg'),
                'active' => request()->routeIs('kondisi-vacant-aims-pdg'),
            ],
            [
                'title' => 'Availability PDG',
                'route' => route('availability-pdg'),
                'active' => request()->routeIs('availability-pdg'),
            ],
            [
                'title' => 'Sistem Informasi AIMS PDG',
                'route' => route('sistem-informasi-aims-pdg'),
                'active' => request()->routeIs('sistem-informasi-aims-pdg'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Besar PDG',
                'route' => route('rencana-pemeliharaan-pdg'),
                'active' => request()->routeIs('rencana-pemeliharaan-pdg'),
            ],
            [
                'title' => 'Realisasi Anggaran AI PDG',
                'route' => route('realisasi-anggaran-ai-pdg'),
                'active' => request()->routeIs('realisasi-anggaran-ai-pdg'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PDG',
                'route' => route('realisasi-progress-fisik-ai-pdg'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-pdg'),
            ],
        ];

        return view('SHG.InputDataMonev.PertaDaya.AssetBreakdownPDG', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = AssetBreakdownPDG::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(AssetBreakdownPDGRequest $request)
    {
        $data = $request->validated();
        $data = AssetBreakdownPDG::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(AssetBreakdownPDGRequest $request, $id)
    {
        $progress = AssetBreakdownPDG::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = AssetBreakdownPDG::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
