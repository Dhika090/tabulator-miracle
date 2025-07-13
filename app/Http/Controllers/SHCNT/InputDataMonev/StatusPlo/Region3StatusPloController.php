<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\StatusPlo;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\StatusPlo\Region3StatusPloRequest;
use App\Models\SHCNT\StatusPlo\Region3StatusPlo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region3StatusPloController extends Controller
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

        return view('SHCNT.InputDataMonev.StatusPlo.Region3StatusPlo', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region3StatusPloRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region3StatusPlo::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region3StatusPlo::select('*')
            ->addSelect(DB::raw("
    TRY_CONVERT(DATE, CONCAT('03-', periode), 320) as periode_date,
    TRY_CONVERT(DATE, tanggal_pengesahan, 303) as tanggal_pengesahan_date
"))
            ->orderBy('periode_date', 'asc')
            ->orderBy('tanggal_pengesahan_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region3StatusPloRequest $request, $id)
    {
        $progress = Region3StatusPlo::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region3StatusPlo::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
