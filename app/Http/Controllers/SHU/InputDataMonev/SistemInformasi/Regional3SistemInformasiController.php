<?php

namespace App\Http\Controllers\SHU\InputDataMonev\SistemInformasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\SistemInformasi\Regional3SistemInformasiRequest;
use App\Models\SHU\SistemInformasi\Regional3SistemInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional3SistemInformasiController extends Controller
{
    
    public function index(Request $request)
    {
        $tabs = collect(config('shu-sistem-informasi'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.SistemInformasi.Regional3SistemInformasi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional3SistemInformasiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional3SistemInformasi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional3SistemInformasi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('03-', periode), 320) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional3SistemInformasiRequest $request, $id)
    {
        $progress = Regional3SistemInformasi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional3SistemInformasi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
