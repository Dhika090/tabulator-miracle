<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\KondisiVacantAims;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\KondisiVacantAims\Region6KondisiVacantAimsRequest;
use App\Models\SHCNT\KondisiVacantAims\Region6KondisiVacantAims;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region6KondisiVacantAimsController extends Controller
{
    public function index(Request $request)
    {
        $tabs = collect(config('shcnt-kondisi-vacant-aims'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHCNT.InputDataMonev.KondisiVacant.Region6KondisiVacantAims', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region6KondisiVacantAimsRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region6KondisiVacantAims::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region6KondisiVacantAims::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('06-', periode), 620) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region6KondisiVacantAimsRequest $request, $id)
    {
        $progress = Region6KondisiVacantAims::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region6KondisiVacantAims::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
