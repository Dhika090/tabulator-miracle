<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\SistemInformasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\SistemInformasi\Region2SistemInformasiRequest;
use App\Models\SHCNT\SistemInformasi\Region2SistemInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region2SistemInformasiController extends Controller
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

        return view('SHCNT.InputDataMonev.SistemInformasi.Region2SistemInformasi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region2SistemInformasiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region2SistemInformasi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region2SistemInformasi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region2SistemInformasiRequest $request, $id)
    {
        $progress = Region2SistemInformasi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region2SistemInformasi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
