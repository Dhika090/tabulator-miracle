<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Cilacap;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Cilacap\KondisiVacantAimsCilacapRequest;
use App\Models\SHRNP\Cilacap\KondisiVacantAimsCilacap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KondisiVacantAimsCilacapController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('cilacap-tabs'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']), // pakai nama route, bukan URL
            ];
        });

        return view('SHRNP.InputDataMonev.Cilacap.KondisiVacantAimsCilacap', [
            'tabs' => $tabs,

        ]);
    }

    public function store(KondisiVacantAimsCilacapRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = KondisiVacantAimsCilacap::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = KondisiVacantAimsCilacap::select('*')
            ->addSelect(DB::raw("
            STR_TO_DATE(CONCAT('0-', periode), '%d-%b-%Y') as periode_date
        "))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(KondisiVacantAimsCilacapRequest $request, $id)
    {
        $progress = KondisiVacantAimsCilacap::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = KondisiVacantAimsCilacap::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
