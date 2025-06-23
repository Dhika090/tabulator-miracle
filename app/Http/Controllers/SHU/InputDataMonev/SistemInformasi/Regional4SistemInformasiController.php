<?php

namespace App\Http\Controllers\SHU\InputDataMonev\SistemInformasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\SistemInformasi\Regional4SistemInformasiRequest;
use App\Models\SHU\SistemInformasi\Regional4SistemInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional4SistemInformasiController extends Controller
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

        return view('SHU.InputDataMonev.SistemInformasi.Regional4SistemInformasi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional4SistemInformasiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional4SistemInformasi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional4SistemInformasi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('04-', periode), 420) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional4SistemInformasiRequest $request, $id)
    {
        $progress = Regional4SistemInformasi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional4SistemInformasi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
