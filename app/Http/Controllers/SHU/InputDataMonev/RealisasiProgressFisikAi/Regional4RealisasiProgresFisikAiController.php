<?php

namespace App\Http\Controllers\SHU\InputDataMonev\RealisasiProgressFisikAi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\RealisasiProgressFisikAi\Regional4RealisasiProgressFisikAiRequest;
use App\Models\SHU\RealisasiProgressFisikAi\Regional4RealisasiProgressFisikAi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional4RealisasiProgresFisikAiController extends Controller
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

        return view('SHU.InputDataMonev.RealisasiProgresFisikAi.Regional4RealisasiProgressFisikAi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional4RealisasiProgressFisikAiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional4RealisasiProgressFisikAi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional4RealisasiProgressFisikAi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('04-', periode), 420) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional4RealisasiProgressFisikAiRequest $request, $id)
    {
        $progress = Regional4RealisasiProgressFisikAi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional4RealisasiProgressFisikAi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
