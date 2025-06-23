<?php

namespace App\Http\Controllers\SHU\InputDataMonev\PelatihanAims;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\PelatihanAims\Regional1PelatihanRequest;
use App\Models\SHU\PelatihanAims\Regional1Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional1PelatihanAimsController extends Controller
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

        return view('SHU.InputDataMonev.PelatihanAims.Regional1Pelatihan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional1PelatihanRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional1Pelatihan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional1Pelatihan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional1PelatihanRequest $request, $id)
    {
        $progress = Regional1Pelatihan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional1Pelatihan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
