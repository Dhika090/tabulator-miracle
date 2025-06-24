<?php

namespace App\Http\Controllers\SHU\InputDataMonev\RealisasiAnggaranAi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\RealisasiAnggaranAi\Regional3RealisasiAnggaranAiRequest;
use App\Models\SHU\RealisasiAnggaranAi\Regional3RealisasiAnggaranAi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional3RealisasiAnggaranAiController extends Controller
{
    
    public function index(Request $request)
    {
        $tabs = collect(config('shu-realisasi-anggarai-ai'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.RealisasiAnggaranAi.Regional3RealisasiAnggaranAi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional3RealisasiAnggaranAiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional3RealisasiAnggaranAi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional3RealisasiAnggaranAi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('03-', periode), 320) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional3RealisasiAnggaranAiRequest $request, $id)
    {
        $progress = Regional3RealisasiAnggaranAi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional3RealisasiAnggaranAi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
