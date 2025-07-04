<?php

namespace App\Http\Controllers\SHU\InputDataMonev\RealisasiAnggaranFigure;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\RealisasiAnggaranFigure\Regional3RealisasiAngganFigureRequest;
use App\Models\SHU\RealisasiAnggaranFigure\Regional3RealisasiAngganFigure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional3RealisasiAnggaranFigureController extends Controller
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

        return view('SHU.InputDataMonev.RealisasiAnggaranFigure.Regional3RealisasiAngganFigure', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional3RealisasiAngganFigureRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional3RealisasiAngganFigure::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional3RealisasiAngganFigure::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('03-', periode), 320) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional3RealisasiAngganFigureRequest $request, $id)
    {
        $progress = Regional3RealisasiAngganFigure::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional3RealisasiAngganFigure::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
