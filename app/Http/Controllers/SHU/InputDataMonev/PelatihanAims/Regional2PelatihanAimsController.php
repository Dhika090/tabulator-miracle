<?php

namespace App\Http\Controllers\SHU\InputDataMonev\PelatihanAims;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\PelatihanAims\Regional2PelatihanRequest;
use App\Models\SHU\PelatihanAims\Regional2Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional2PelatihanAimsController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shu-pelatihan-aims'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.PelatihanAims.Regional2Pelatihan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional2PelatihanRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional2Pelatihan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional2Pelatihan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional2PelatihanRequest $request, $id)
    {
        $progress = Regional2Pelatihan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional2Pelatihan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
