<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\StatusPlo;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\StatusPlo\Region5StatusPloRequest;
use App\Models\SHCNT\StatusPlo\Region5StatusPlo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region5StatusPloController extends Controller
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

        return view('SHCNT.InputDataMonev.StatusPlo.Region5StatusPlo', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region5StatusPloRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region5StatusPlo::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region5StatusPlo::select('*')
            ->addSelect(DB::raw("
    TRY_CONVERT(DATE, CONCAT('05-', periode), 520) as periode_date,
    TRY_CONVERT(DATE, tanggal_pengesahan, 503) as tanggal_pengesahan_date
"))
            ->orderBy('periode_date', 'asc')
            ->orderBy('tanggal_pengesahan_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region5StatusPloRequest $request, $id)
    {
        $progress = Region5StatusPlo::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region5StatusPlo::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
