<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\SistemInformasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\SistemInformasi\Region7SistemInformasiRequest;
use App\Models\SHCNT\SistemInformasi\Region7SistemInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region7SistemInformasiController extends Controller
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

        return view('SHCNT.InputDataMonev.SistemInformasi.Region7SistemInformasi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region7SistemInformasiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region7SistemInformasi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region7SistemInformasi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('07-', periode), 720) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region7SistemInformasiRequest $request, $id)
    {
        $progress = Region7SistemInformasi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region7SistemInformasi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
