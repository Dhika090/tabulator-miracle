<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\PelatihanAims;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\PelatihanAims\Region7PelatihanAimsRequest;
use App\Models\SHCNT\PelatihanAims\Region7PelatihanAims;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region7PelatihanAimsController extends Controller
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

        return view('SHCNT.InputDataMonev.PelatihanAims.Region7Pelatihan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region7PelatihanAimsRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region7PelatihanAims::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region7PelatihanAims::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('07-', periode), 720) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region7PelatihanAimsRequest $request, $id)
    {
        $progress = Region7PelatihanAims::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region7PelatihanAims::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
