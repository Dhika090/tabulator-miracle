<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\PelatihanAims;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\PelatihanAims\Region6PelatihanAimsRequest;
use App\Models\SHCNT\PelatihanAims\Region6PelatihanAims;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region6PelatihanAimsController extends Controller
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

        return view('SHCNT.InputDataMonev.PelatihanAims.Region6Pelatihan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region6PelatihanAimsRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region6PelatihanAims::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region6PelatihanAims::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('06-', periode), 620) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region6PelatihanAimsRequest $request, $id)
    {
        $progress = Region6PelatihanAims::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region6PelatihanAims::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
