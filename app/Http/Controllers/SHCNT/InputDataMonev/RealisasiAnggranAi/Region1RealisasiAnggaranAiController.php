<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\RealisasiAnggranAi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\RealisasiAnggaranAi\Region1RealisasiAnggaranAiRequest;
use App\Models\SHCNT\RealisasiAnggaranAi\Region1RealisasiAnggaranAi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region1RealisasiAnggaranAiController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shcnt-realisasi-anggarai-ai'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHCNT.InputDataMonev.RealisasiAnggaranAi.Region1RealisasiAnggaranAi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region1RealisasiAnggaranAiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region1RealisasiAnggaranAi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region1RealisasiAnggaranAi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region1RealisasiAnggaranAiRequest $request, $id)
    {
        $progress = Region1RealisasiAnggaranAi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region1RealisasiAnggaranAi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
