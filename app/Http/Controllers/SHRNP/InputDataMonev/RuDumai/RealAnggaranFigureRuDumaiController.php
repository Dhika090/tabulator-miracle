<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\RuDumai;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\RuDumai\RealAnggaranFigureRuDumaiRequest;
use App\Models\SHRNP\RuDumai\RealAnggaranFigureRuDumai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RealAnggaranFigureRuDumaiController extends Controller
{
   
    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI Ru Dumai',
                'route' => route('ru-dumai'),
                'active' => request()->routeIs('ru-dumai'),
            ],
            [
                'title' => 'Asset Breakdown Ru Dumai',
                'route' => route('asset-breakdown-ru-dumai'),
                'active' => request()->routeIs('asset-breakdown-ru-dumai'),
            ],
            [
                'title' => 'Availability Ru Dumai',
                'route' => route('availability-ru-dumai'),
                'active' => request()->routeIs('availability-ru-dumai'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims Ru Dumai',
                'route' => route('kondisi-vacant-aims-ru-dumai'),
                'active' => request()->routeIs('kondisi-vacant-aims-ru-dumai'),
            ],
            [
                'title' => 'Mandatory Certification Ru Dumai',
                'route' => route('mandatory-certification-ru-dumai'),
                'active' => request()->routeIs('mandatory-certification-ru-dumai'),
            ],
            [
                'title' => 'Pelatihan Aims Ru Dumai',
                'route' => route('pelatihan-aims-ru-dumai'),
                'active' => request()->routeIs('pelatihan-aims-ru-dumai'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Ru Dumai',
                'route' => route('rencana-pemeliharaan-ru-dumai'),
                'active' => request()->routeIs('rencana-pemeliharaan-ru-dumai'),
            ],
            [
                'title' => 'Real Anggaran AI Ru Dumai',
                'route' => route('real-anggaran-ai-ru-dumai'),
                'active' => request()->routeIs('real-anggaran-ai-ru-dumai'),
            ],
            [
                'title' => 'Real Anggaran Figure Ru Dumai',
                'route' => route('real-anggaran-figure-ru-dumai'),
                'active' => request()->routeIs('real-anggaran-figure-ru-dumai'),
            ],
            [
                'title' => 'Realisasi Prog Fisik AI Ru Dumai',
                'route' => route('real-prog-fisik-ru-dumai'),
                'active' => request()->routeIs('real-prog-fisik-ru-dumai'),
            ],
            [
                'title' => 'Sistem Informasi Aims Ru Dumai',
                'route' => route('sistem-informasi-aims-ru-dumai'),
                'active' => request()->routeIs('sistem-informasi-aims-ru-dumai'),
            ],
            [
                'title' => 'Status PLO Ru Dumai',
                'route' => route('status-plo-ru-dumai'),
                'active' => request()->routeIs('status-plo-ru-dumai'),
            ],
            [
                'title' => 'SAP Asset Ru Dumai',
                'route' => route('sap-asset-ru-dumai'),
                'active' => request()->routeIs('sap-asset-ru-dumai'),
            ],


        ];
        return view('SHRNP.InputDataMonev.RuDumai.RealAnggaranFigureRuDumuai', compact('tabs'));
    }

    public function store(RealAnggaranFigureRuDumaiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RealAnggaranFigureRuDumai::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RealAnggaranFigureRuDumai::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(RealAnggaranFigureRuDumaiRequest $request, $id)
    {
        $progress = RealAnggaranFigureRuDumai::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RealAnggaranFigureRuDumai::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
