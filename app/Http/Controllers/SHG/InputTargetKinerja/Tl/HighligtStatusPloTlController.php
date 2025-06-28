<?php

namespace App\Http\Controllers\SHG\InputTargetKinerja\Tl;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\TargetKinerja\Tl\TlHighlightStatusPloRequest;
use App\Models\SHG\TargetKinerja\Tl\TlHighlightStatusPlo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HighligtStatusPloTlController extends Controller
{
    public function index(Request $request)
    {
        $tabs = collect(config('shg-tindak-lanjut-hasil-monev'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHG.InputTargetKinerja.Tl.TlHighlightStatusPlo', [
            'tabs' => $tabs,

        ]);
    }

    public function store(TlHighlightStatusPloRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = TlHighlightStatusPlo::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = TlHighlightStatusPlo::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(TlHighlightStatusPloRequest $request, $id)
    {
        $progress = TlHighlightStatusPlo::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = TlHighlightStatusPlo::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
