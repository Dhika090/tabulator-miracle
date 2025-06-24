<?php

namespace App\Http\Controllers\SHU\InputDataMonev\KondisiVacantAims;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\KondisiVacant\Regional3KondisiVacantRequest;
use App\Models\SHU\KondisiVacant\Regional3KondisiVacant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional3KondisiVacantAimsController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shu-kondisi-vacant-aims'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.KondisiVacant.Regional3KondisiVacant', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional3KondisiVacantRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional3KondisiVacant::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional3KondisiVacant::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('03-', periode), 320) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional3KondisiVacantRequest $request, $id)
    {
        $progress = Regional3KondisiVacant::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional3KondisiVacant::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
