<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\PelatihanAims;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\PelatihanAims\Region1PelatihanAimsRequest;
use App\Models\SHCNT\PelatihanAims\Region1PelatihanAims;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region1PelatihanAimsController extends Controller
{
    public function index(Request $request)
    {
        $tabs = collect(config('shcnt-pelatihan-aims'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHCNT.InputDataMonev.PelatihanAims.Region1Pelatihan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region1PelatihanAimsRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region1PelatihanAims::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region1PelatihanAims::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region1PelatihanAimsRequest $request, $id)
    {
        $progress = Region1PelatihanAims::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region1PelatihanAims::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
