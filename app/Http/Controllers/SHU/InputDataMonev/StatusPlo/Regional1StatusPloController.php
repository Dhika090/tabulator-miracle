<?php

namespace App\Http\Controllers\SHU\InputDataMonev\StatusPlo;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\StatusPlo\Regional1StatusPloRequest;
use App\Models\SHU\StatusPlo\Regional1StatusPlo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional1StatusPloController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shu-status-plo'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.StatusPlo.Regional1StatusPlo', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional1StatusPloRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional1StatusPlo::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional1StatusPlo::select('*')
            ->addSelect(DB::raw("
    TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date,
    TRY_CONVERT(DATE, tanggal_pengesahan, 103) as tanggal_pengesahan_date
"))
            ->orderBy('periode_date', 'asc')
            ->orderBy('tanggal_pengesahan_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional1StatusPloRequest $request, $id)
    {
        $progress = Regional1StatusPlo::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional1StatusPlo::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
