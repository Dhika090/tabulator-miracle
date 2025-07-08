<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\SistemInformasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\SistemInformasi\Region1SistemInformasiRequest;
use App\Models\SHCNT\SistemInformasi\Region1SistemInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region1SistemInformasiController extends Controller
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

        return view('SHCNT.InputDataMonev.SistemInformasi.Region1SistemInformasi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region1SistemInformasiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region1SistemInformasi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region1SistemInformasi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region1SistemInformasiRequest $request, $id)
    {
        $progress = Region1SistemInformasi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region1SistemInformasi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
