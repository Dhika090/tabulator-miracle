<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\SistemInformasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\SistemInformasi\Region3SistemInformasiRequest;
use App\Models\SHCNT\SistemInformasi\Region3SistemInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region3SistemInformasiController extends Controller
{
   
    public function index(Request $request)
    {
        $tabs = collect(config('shcnt-sistem-informasi'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHCNT.InputDataMonev.SistemInformasi.Region3SistemInformasi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region3SistemInformasiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region3SistemInformasi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region3SistemInformasi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('03-', periode), 320) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region3SistemInformasiRequest $request, $id)
    {
        $progress = Region3SistemInformasi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region3SistemInformasi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
