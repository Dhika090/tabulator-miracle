<?php

namespace App\Http\Controllers\SHU\InputDataMonev\RealisasiAnggaranAi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\RealisasiAnggaranAi\Regional1RealisasiAnggaranAiRequest;
use App\Models\SHU\RealisasiAnggaranAi\Regional1RealisasiAnggaranAi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional1RealisasiAnggaranAiController extends Controller
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

        return view('SHU.InputDataMonev.RealisasiAnggaranAi.Regional1RealisasiAnggaranAi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional1RealisasiAnggaranAiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional1RealisasiAnggaranAi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional1RealisasiAnggaranAi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional1RealisasiAnggaranAiRequest $request, $id)
    {
        $progress = Regional1RealisasiAnggaranAi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional1RealisasiAnggaranAi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
