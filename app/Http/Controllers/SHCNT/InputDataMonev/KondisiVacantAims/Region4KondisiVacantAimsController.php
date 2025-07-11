<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\KondisiVacantAims;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\KondisiVacantAims\Region4KondisiVacantAimsRequest;
use App\Models\SHCNT\KondisiVacantAims\Region4KondisiVacantAims;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region4KondisiVacantAimsController extends Controller
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

        return view('SHCNT.InputDataMonev.KondisiVacant.Region4KondisiVacantAims', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region4KondisiVacantAimsRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region4KondisiVacantAims::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region4KondisiVacantAims::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('04-', periode), 420) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region4KondisiVacantAimsRequest $request, $id)
    {
        $progress = Region4KondisiVacantAims::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region4KondisiVacantAims::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
