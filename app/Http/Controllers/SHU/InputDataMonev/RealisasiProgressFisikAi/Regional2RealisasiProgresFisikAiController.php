<?php

namespace App\Http\Controllers\SHU\InputDataMonev\RealisasiProgressFisikAi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\RealisasiProgressFisikAi\Regional2RealisasiProgressFisikAiRequest;
use App\Models\SHU\RealisasiProgressFisikAi\Regional2RealisasiProgressFisikAi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional2RealisasiProgresFisikAiController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shu-realisasi-progress-fisik-ai'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.RealisasiProgresFisikAi.Regional2RealisasiProgressFisikAi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional2RealisasiProgressFisikAiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional2RealisasiProgressFisikAi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional2RealisasiProgressFisikAi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional2RealisasiProgressFisikAiRequest $request, $id)
    {
        $progress = Regional2RealisasiProgressFisikAi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional2RealisasiProgressFisikAi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
