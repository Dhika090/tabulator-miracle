<?php

namespace App\Http\Controllers\SHU\InputDataMonev\SistemInformasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\SistemInformasi\Regional2SistemInformasiRequest;
use App\Models\SHU\SistemInformasi\Regional2SistemInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional2SistemInformasiController extends Controller
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

        return view('SHU.InputDataMonev.SistemInformasi.Regional2SistemInformasi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional2SistemInformasiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional2SistemInformasi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional2SistemInformasi::select('*')
            ->addSelect(DB ::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional2SistemInformasiRequest $request, $id)
    {
        $progress = Regional2SistemInformasi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional2SistemInformasi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
