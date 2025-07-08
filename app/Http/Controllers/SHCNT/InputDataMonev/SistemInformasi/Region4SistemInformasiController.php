<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\SistemInformasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\SistemInformasi\Region4SistemInformasiRequest;
use App\Models\SHCNT\SistemInformasi\Region4SistemInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region4SistemInformasiController extends Controller
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

        return view('SHCNT.InputDataMonev.SistemInformasi.Region4SistemInformasi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region4SistemInformasiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region4SistemInformasi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region4SistemInformasi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('04-', periode), 420) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region4SistemInformasiRequest $request, $id)
    {
        $progress = Region4SistemInformasi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region4SistemInformasi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
