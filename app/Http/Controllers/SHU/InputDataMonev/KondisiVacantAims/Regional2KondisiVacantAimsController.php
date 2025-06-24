<?php

namespace App\Http\Controllers\SHU\InputDataMonev\KondisiVacantAims;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\KondisiVacant\Regional2KondisiVacantRequest;
use App\Models\SHU\KondisiVacant\Regional2KondisiVacant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional2KondisiVacantAimsController extends Controller
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

        return view('SHU.InputDataMonev.KondisiVacant.Regional2KondisiVacant', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional2KondisiVacantRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional2KondisiVacant::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional2KondisiVacant::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional2KondisiVacantRequest $request, $id)
    {
        $progress = Regional2KondisiVacant::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional2KondisiVacant::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
