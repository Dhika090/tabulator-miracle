<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\StatusPlo;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\StatusPlo\Region6StatusPloRequest;
use App\Models\SHCNT\StatusPlo\Region6StatusPlo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region6StatusPloController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shcnt-status-plo'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHCNT.InputDataMonev.StatusPlo.Region6StatusPlo', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region6StatusPloRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region6StatusPlo::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region6StatusPlo::select('*')
            ->addSelect(DB::raw("
    TRY_CONVERT(DATE, CONCAT('06-', periode), 620) as periode_date,
    TRY_CONVERT(DATE, tanggal_pengesahan, 603) as tanggal_pengesahan_date
"))
            ->orderBy('periode_date', 'asc')
            ->orderBy('tanggal_pengesahan_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region6StatusPloRequest $request, $id)
    {
        $progress = Region6StatusPlo::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region6StatusPlo::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
