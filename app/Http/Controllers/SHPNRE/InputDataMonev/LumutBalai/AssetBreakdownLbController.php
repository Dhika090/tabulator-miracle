<?php

namespace App\Http\Controllers\SHPNRE\InputDataMonev\LumutBalai;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\LumutBalai\AssetBreakdownLbRequest;
use App\Models\SHPNRE\LumutBalai\AssetBreakdownLB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetBreakdownLbController extends Controller
{
    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI Lumut Balai',
                'route' => route('lumut-balai'),
                'active' => request()->routeIs('lumut-balai'),
            ],
            [
                'title' => 'Asset Breakdown Lumut Balai',
                'route' => route('asset-breakdown-lb'),
                'active' => request()->routeIs('asset-breakdown-lb'),
            ],
            [
                'title' => 'Summary PLO Lumut Balai',
                'route' => route('summary-plo-lb'),
                'active' => request()->routeIs('summary-plo-lb'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims Lumut Balai',
                'route' => route('kondisi-vacant-aims-lb'),
                'active' => request()->routeIs('kondisi-vacant-aims-lb'),
            ],
            [
                'title' => 'Pelatihan Aims Lumut Balai',
                'route' => route('pelatihan-aims-lb'),
                'active' => request()->routeIs('pelatihan-aims-lb'),
            ],
            [
                'title' => 'Rencana Pemeliharaan LB',
                'route' => route('rencana-pemeliharaan-lb'),
                'active' => request()->routeIs('rencana-pemeliharaan-lb'),
            ],
            [
                'title' => 'Availability Lumut Balai',
                'route' => route('availability-lb'),
                'active' => request()->routeIs('availability-lb'),
            ],
            [
                'title' => 'Mandatory Certification Aims Lumut Balai',
                'route' => route('mandatory-certification-lb'),
                'active' => request()->routeIs('mandatory-certification-lb'),
            ],
            [
                'title' => 'Real Anggaran AI Lumut Balai',
                'route' => route('real-anggaran-ai-lb'),
                'active' => request()->routeIs('real-anggaran-ai-lb'),
            ],
            [
                'title' => 'Real Anggaran Figure Lumut Balai',
                'route' => route('real-anggaran-figure-lb'),
                'active' => request()->routeIs('real-anggaran-figure-lb'),
            ],
            [
                'title' => 'Real Prog Fisik AI LB',
                'route' => route('real-prog-fisik-ai-lb'),
                'active' => request()->routeIs('real-prog-fisik-ai-lb'),
            ],
            [
                'title' => 'Sistem Informasi Aims Lumut Balai',
                'route' => route('sistem-informasi-aims-lb'),
                'active' => request()->routeIs('sistem-informasi-aims-lb'),
            ]
        ];
        return view('SHPNRE.InputDataMonev.LumutBalai.AssetBreakdownLB', compact('tabs'));
    }

    public function store(AssetBreakdownLbRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = AssetBreakdownLB::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = AssetBreakdownLB::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(AssetBreakdownLbRequest $request, $id)
    {
        $progress = AssetBreakdownLB::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = AssetBreakdownLB::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
