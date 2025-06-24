<?php

namespace App\Http\Controllers\SHU\InputDataMonev\RealisasiAnggaranAi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\RealisasiAnggaranAi\Regional2RealisasiAnggaranAiRequest;
use App\Models\SHU\RealisasiAnggaranAi\Regional2RealisasiAnggaranAi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional2RealisasiAnggaranAiController extends Controller
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

        return view('SHU.InputDataMonev.RealisasiAnggaranAi.Regional2RealisasiAnggaranAi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional2RealisasiAnggaranAiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional2RealisasiAnggaranAi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional2RealisasiAnggaranAi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional2RealisasiAnggaranAiRequest $request, $id)
    {
        $progress = Regional2RealisasiAnggaranAi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional2RealisasiAnggaranAi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
