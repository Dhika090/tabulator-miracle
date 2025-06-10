<?php

namespace App\Http\Controllers\SHPNRE\InputDataMonev\Karaha;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\Karaha\RealAnggaranFigureKarahaRequest;
use App\Models\SHPNRE\Karaha\RealAnggaranFigureKaraha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RealAnggaranFigureKarahaController extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI Karaha',
                'route' => route('karaha'),
                'active' => request()->routeIs('karaha'),
            ],
            [
                'title' => 'Asset Breakdown Lumut Balai',
                'route' => route('asset-breakdown-karaha'),
                'active' => request()->routeIs('asset-breakdown-karaha'),
            ],
            [
                'title' => 'Availability Karaha',
                'route' => route('availability-karaha'),
                'active' => request()->routeIs('availability-karaha'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims Karaha',
                'route' => route('kondisi-vacant-aims-karaha'),
                'active' => request()->routeIs('kondisi-vacant-aims-karaha'),
            ],
            [
                'title' => 'Mandatory Certification Aims Lumut Balai',
                'route' => route('mandatory-certification-karaha'),
                'active' => request()->routeIs('mandatory-certification-karaha'),
            ],
            [
                'title' => 'Pelatihan Aims Karaha',
                'route' => route('pelatihan-aims-karaha'),
                'active' => request()->routeIs('pelatihan-aims-karaha'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Karaha',
                'route' => route('rencana-pemeliharaan-karaha'),
                'active' => request()->routeIs('rencana-pemeliharaan-karaha'),
            ],
            [
                'title' => 'Real Anggaran AI Karaha',
                'route' => route('real-anggaran-ai-karaha'),
                'active' => request()->routeIs('real-anggaran-ai-karaha'),
            ],
            [
                'title' => 'Real Anggaran Figure Karaha',
                'route' => route('real-anggaran-figure-karaha'),
                'active' => request()->routeIs('real-anggaran-figure-karaha'),
            ],
            [
                'title' => 'Realisasi Prog Fisik Karaha',
                'route' => route('real-prog-fisik-karaha'),
                'active' => request()->routeIs('real-prog-fisik-karaha'),
            ],
            [
                'title' => 'Sistem Informasi Aims Karaha',
                'route' => route('sistem-informasi-aims-karaha'),
                'active' => request()->routeIs('sistem-informasi-aims-karaha'),
            ],
            [
                'title' => 'Summary PLO Karaha',
                'route' => route('summary-plo-karaha'),
                'active' => request()->routeIs('summary-plo-karaha'),
            ]
        ];
        return view('SHPNRE.InputDataMonev.Karaha.RealAnggaranFigureKaraha', compact('tabs'));
    }

    public function store(RealAnggaranFigureKarahaRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RealAnggaranFigureKaraha::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RealAnggaranFigureKaraha::select('*')
            ->addSelect(DB::raw("
            STR_TO_DATE(CONCAT('01-', periode), '%d-%b-%Y') as periode_date
        "))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(RealAnggaranFigureKarahaRequest $request, $id)
    {
        $progress = RealAnggaranFigureKaraha::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RealAnggaranFigureKaraha::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
