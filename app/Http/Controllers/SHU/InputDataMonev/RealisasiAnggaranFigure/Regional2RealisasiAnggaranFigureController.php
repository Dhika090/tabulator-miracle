<?php

namespace App\Http\Controllers\SHU\InputDataMonev\RealisasiAnggaranFigure;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\RealisasiAnggaranFigure\Regional2RealisasiAngganFigureRequest;
use App\Models\SHU\RealisasiAnggaranFigure\Regional2RealisasiAngganFigure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional2RealisasiAnggaranFigureController extends Controller
{
    public function index(Request $request)
    {
        $tabs = collect(config('shu-realisasi-anggaran-figure'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.RealisasiAnggaranFigure.Regional2RealisasiAngganFigure', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional2RealisasiAngganFigureRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional2RealisasiAngganFigure::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional2RealisasiAngganFigure::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional2RealisasiAngganFigureRequest $request, $id)
    {
        $progress = Regional2RealisasiAngganFigure::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional2RealisasiAngganFigure::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
