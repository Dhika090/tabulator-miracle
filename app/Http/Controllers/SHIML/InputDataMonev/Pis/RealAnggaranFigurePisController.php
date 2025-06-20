<?php

namespace App\Http\Controllers\SHIML\InputDataMonev\Pis;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHIML\Pis\RealAnggaranFigurePisRequest;
use App\Models\SHIML\Pis\RealAnggaranFigurePis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RealAnggaranFigurePisController extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI   PIS',
                'route' => route('pis'),
                'active' => request()->routeIs('pis'),
            ],
            [
                'title' => 'Asset Breakdown   PIS',
                'route' => route('asset-breakdown-pis'),
                'active' => request()->routeIs('asset-breakdown-pis'),
            ],
            [
                'title' => 'Availability   PIS',
                'route' => route('availability-pis'),
                'active' => request()->routeIs('availability-pis'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims   PIS',
                'route' => route('kondisi-vacant-aims-pis'),
                'active' => request()->routeIs('kondisi-vacant-aims-pis'),
            ],
            [
                'title' => 'Mandatory Certification   PIS',
                'route' => route('mandatory-certification-pis'),
                'active' => request()->routeIs('mandatory-certification-pis'),
            ],
            [
                'title' => 'Pelatihan Aims   PIS',
                'route' => route('pelatihan-aims-pis'),
                'active' => request()->routeIs('pelatihan-aims-pis'),
            ],
            [
                'title' => 'Rencana Pemeliharaan   PIS',
                'route' => route('rencana-pemeliharaan-pis'),
                'active' => request()->routeIs('rencana-pemeliharaan-pis'),
            ],
            [
                'title' => 'Real Anggaran AI   PIS',
                'route' => route('real-anggaran-ai-pis'),
                'active' => request()->routeIs('real-anggaran-ai-pis'),
            ],
            [
                'title' => 'Real Anggaran Figure   PIS',
                'route' => route('real-anggaran-figure-pis'),
                'active' => request()->routeIs('real-anggaran-figure-pis'),
            ],
            [
                'title' => 'Real Prog Fisik   PIS',
                'route' => route('real-prog-fisik-pis'),
                'active' => request()->routeIs('real-prog-fisik-pis'),
            ],
            [
                'title' => 'Sistem Informasi Aims   PIS',
                'route' => route('sistem-informasi-aims-pis'),
                'active' => request()->routeIs('sistem-informasi-aims-pis'),
            ],
            [
                'title' => 'Status PLO PIS',
                'route' => route('status-plo-pis'),
                'active' => request()->routeIs('status-plo-pis'),
            ],
            [
                'title' => 'SAP Asset PIS',
                'route' => route('sap-asset-pis'),
                'active' => request()->routeIs('sap-asset-pis'),
            ],


        ];
        return view('SHIML.InputDataMonev.Pis.RealAnggaranFigurePis', compact('tabs'));
    }

    public function store(RealAnggaranFigurePisRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RealAnggaranFigurePis::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RealAnggaranFigurePis::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }
    public function update(RealAnggaranFigurePisRequest $request, $id)
    {
        $progress = RealAnggaranFigurePis::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RealAnggaranFigurePis::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
