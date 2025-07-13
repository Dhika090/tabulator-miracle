<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\StatusPlo;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\StatusPlo\Region7StatusPloRequest;
use App\Models\SHCNT\StatusPlo\Region7StatusPlo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region7StatusPloController extends Controller
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

        return view('SHCNT.InputDataMonev.StatusPlo.Region7StatusPlo', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region7StatusPloRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region7StatusPlo::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region7StatusPlo::select('*')
            ->addSelect(DB::raw("
    TRY_CONVERT(DATE, CONCAT('07-', periode), 720) as periode_date,
    TRY_CONVERT(DATE, tanggal_pengesahan, 703) as tanggal_pengesahan_date
"))
            ->orderBy('periode_date', 'asc')
            ->orderBy('tanggal_pengesahan_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region7StatusPloRequest $request, $id)
    {
        $progress = Region7StatusPlo::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region7StatusPlo::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
