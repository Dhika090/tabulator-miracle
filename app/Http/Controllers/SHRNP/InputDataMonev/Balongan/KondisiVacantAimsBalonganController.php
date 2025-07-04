<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Balongan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Balongan\KondisiVacantAimsBalonganRequest;
use App\Models\SHRNP\Balongan\KondisiVacantAimsBalongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KondisiVacantAimsBalonganController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shrnp-balongan'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHRNP.InputDataMonev.Balikpapan.KondisiVacantAimsBalongan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(KondisiVacantAimsBalonganRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = KondisiVacantAimsBalongan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = KondisiVacantAimsBalongan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(KondisiVacantAimsBalonganRequest $request, $id)
    {
        $progress = KondisiVacantAimsBalongan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = KondisiVacantAimsBalongan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
