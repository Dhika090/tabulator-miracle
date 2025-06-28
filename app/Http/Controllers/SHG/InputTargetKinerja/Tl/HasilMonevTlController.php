<?php

namespace App\Http\Controllers\SHG\InputTargetKinerja\Tl;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\TargetKinerja\Tl\TlHasilMonevRequest;
use App\Models\SHG\TargetKinerja\Tl\TlHasilMonev;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilMonevTlController extends Controller
{
    public function index(Request $request)
    {
        $tabs = collect(config('shg-tindak-lanjut-hasil-monev'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHG.InputTargetKinerja.Tl.TlHasilMonev', [
            'tabs' => $tabs,

        ]);
    }

    public function store(TlHasilMonevRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = TlHasilMonev::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = TlHasilMonev::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->orderBy('no', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(TlHasilMonevRequest $request, $id)
    {
        $progress = TlHasilMonev::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = TlHasilMonev::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
