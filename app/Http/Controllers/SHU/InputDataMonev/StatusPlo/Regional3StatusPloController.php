<?php

namespace App\Http\Controllers\SHU\InputDataMonev\StatusPlo;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\StatusPlo\Regional3StatusPloRequest;
use App\Models\SHU\StatusPlo\Regional3StatusPlo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional3StatusPloController extends Controller
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

        return view('SHU.InputDataMonev.StatusPlo.Regional3StatusPlo', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional3StatusPloRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional3StatusPlo::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional3StatusPlo::select('*')
            ->addSelect(DB::raw("
    TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date,
    TRY_CONVERT(DATE, masa_berlaku, 103) as masa_berlaku_date
"))
            ->orderBy('periode_date', 'asc')
            ->orderBy('masa_berlaku', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional3StatusPloRequest $request, $id)
    {
        $progress = Regional3StatusPlo::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional3StatusPlo::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
