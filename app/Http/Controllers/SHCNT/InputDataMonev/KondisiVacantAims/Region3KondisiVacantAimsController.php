<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\KondisiVacantAims;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\KondisiVacantAims\Region3KondisiVacantAimsRequest;
use App\Models\SHCNT\KondisiVacantAims\Region3KondisiVacantAims;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region3KondisiVacantAimsController extends Controller
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

        return view('SHCNT.InputDataMonev.KondisiVacant.Region3KondisiVacantAims', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region3KondisiVacantAimsRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region3KondisiVacantAims::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region3KondisiVacantAims::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('03-', periode), 330) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region3KondisiVacantAimsRequest $request, $id)
    {
        $progress = Region3KondisiVacantAims::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region3KondisiVacantAims::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
