<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Kasim;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Kasim\KondisiVacantAimsKasimRequest;
use App\Models\SHRNP\Kasim\KondisiVacantAimsKasim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KondisiVacantAimsKasimController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shrnp-kasim'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHRNP.InputDataMonev.Kasim.KondisiVacantAimsKasim', [
            'tabs' => $tabs,

        ]);
    }

    public function store(KondisiVacantAimsKasimRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = KondisiVacantAimsKasim::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = KondisiVacantAimsKasim::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(KondisiVacantAimsKasimRequest $request, $id)
    {
        $progress = KondisiVacantAimsKasim::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = KondisiVacantAimsKasim::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
