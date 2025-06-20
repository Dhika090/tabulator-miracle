<?php

namespace App\Http\Controllers\SHIML\InputDataMonev\PTK;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHIML\PTK\AssetBreakdownPtkRequest;
use App\Models\SHIML\PTK\AssetBreakdownPtk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetBreakdownPtkController extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI PTK',
                'route' => route('ptk'),
                'active' => request()->routeIs('ptk'),
            ],
            [
                'title' => 'Asset Breakdown PTK',
                'route' => route('asset-breakdown-ptk'),
                'active' => request()->routeIs('asset-breakdown-ptk'),
            ],
            [
                'title' => 'Availability PTK',
                'route' => route('availability-ptk'),
                'active' => request()->routeIs('availability-ptk'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims PTK',
                'route' => route('kondisi-vacant-aims-ptk'),
                'active' => request()->routeIs('kondisi-vacant-aims-ptk'),
            ],
            [
                'title' => 'Mandatory Certification PTK',
                'route' => route('mandatory-certification-ptk'),
                'active' => request()->routeIs('mandatory-certification-ptk'),
            ],
            [
                'title' => 'Pelatihan Aims PTK',
                'route' => route('pelatihan-aims-ptk'),
                'active' => request()->routeIs('pelatihan-aims-ptk'),
            ],
            [
                'title' => 'Rencana Pemeliharaan PTK',
                'route' => route('rencana-pemeliharaan-ptk'),
                'active' => request()->routeIs('rencana-pemeliharaan-ptk'),
            ],
            [
                'title' => 'Real Anggaran AI PTK',
                'route' => route('real-anggaran-ai-ptk'),
                'active' => request()->routeIs('real-anggaran-ai-ptk'),
            ],
            [
                'title' => 'Real Anggaran Figure PTK',
                'route' => route('real-anggaran-figure-ptk'),
                'active' => request()->routeIs('real-anggaran-figure-ptk'),
            ],
            [
                'title' => 'Real Prog Fisik PTK',
                'route' => route('real-prog-fisik-ptk'),
                'active' => request()->routeIs('real-prog-fisik-ptk'),
            ],
            [
                'title' => 'Sistem Informasi Aims PTK',
                'route' => route('sistem-informasi-aims-ptk'),
                'active' => request()->routeIs('sistem-informasi-aims-ptk'),
            ],
            [
                'title' => 'Status PLO PTK',
                'route' => route('status-plo-ptk'),
                'active' => request()->routeIs('status-plo-ptk'),
            ],
            [
                'title' => 'SAP Asset PTK',
                'route' => route('sap-asset-ptk'),
                'active' => request()->routeIs('sap-asset-ptk'),
            ],


        ];
        return view('SHIML.InputDataMonev.Ptk.AssetBreakdownPtk', compact('tabs'));
    }

    public function store(AssetBreakdownPtkRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = AssetBreakdownPtk::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = AssetBreakdownPtk::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }
    public function update(AssetBreakdownPtkRequest $request, $id)
    {
        $progress = AssetBreakdownPtk::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = AssetBreakdownPtk::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
