<?php

namespace App\Http\Controllers\SHPNRE\InputDataMonev\PPI;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\PPI\AvailabilityPPIRequest;
use App\Models\SHPNRE\PPI\AvailabilityPPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvailabilityPPIController extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI PPI',
                'route' => route('ppi'),
                'active' => request()->routeIs('ppi'),
            ],
            [
                'title' => 'Asset Breakdown PPI',
                'route' => route('asset-breakdown-ppi'),
                'active' => request()->routeIs('asset-breakdown-ppi'),
            ],
            [
                'title' => 'Availability PPI',
                'route' => route('availability-ppi'),
                'active' => request()->routeIs('availability-ppi'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims PPI',
                'route' => route('kondisi-vacant-aims-ppi'),
                'active' => request()->routeIs('kondisi-vacant-aims-ppi'),
            ],
            [
                'title' => 'Mandatory Certification PPI',
                'route' => route('mandatory-certification-ppi'),
                'active' => request()->routeIs('mandatory-certification-ppi'),
            ],
            [
                'title' => 'Pelatihan Aims PPI',
                'route' => route('pelatihan-aims-ppi'),
                'active' => request()->routeIs('pelatihan-aims-ppi'),
            ],
            [
                'title' => 'Rencana Pemeliharaan PPI',
                'route' => route('rencana-pemeliharaan-ppi'),
                'active' => request()->routeIs('rencana-pemeliharaan-ppi'),
            ],
            [
                'title' => 'Real Anggaran AI PPI',
                'route' => route('real-anggaran-ai-ppi'),
                'active' => request()->routeIs('real-anggaran-ai-ppi'),
            ],
            [
                'title' => 'Real Anggaran Figure PPI',
                'route' => route('real-anggaran-figure-ppi'),
                'active' => request()->routeIs('real-anggaran-figure-ppi'),
            ],
            [
                'title' => 'Realisasi Prog Fisik PPI',
                'route' => route('real-prog-fisik-ppi'),
                'active' => request()->routeIs('real-prog-fisik-ppi'),
            ],
            [
                'title' => 'Sistem Informasi Aims PPI',
                'route' => route('sistem-informasi-aims-ppi'),
                'active' => request()->routeIs('sistem-informasi-aims-ppi'),
            ],
            [
                'title' => 'Summary PLO PPI',
                'route' => route('summary-plo-ppi'),
                'active' => request()->routeIs('summary-plo-ppi'),
            ],
            
        ];
        return view('SHPNRE.InputDataMonev.PPI.AvailabilityPPI', compact('tabs'));
    }

    public function store(AvailabilityPPIRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = AvailabilityPPI::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = AvailabilityPPI::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(AvailabilityPPIRequest $request, $id)
    {
        $progress = AvailabilityPPI::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = AvailabilityPPI::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
