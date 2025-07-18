<?php

namespace App\Http\Controllers\SHPNRE\TargetKinerja\HasilMonev;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\TargetKinerja\TindakLanjut\HighLightInformasiDomainShpnreRequest;
use App\Models\SHPNRE\TargetKinerja\TindakLanjut\HighLightInformasiDomainShpnre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HighlightInformasiDomainShpnreController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shpnre-tindak-lanjut-hasil-monev'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHPNRE.TargetKinerja.HasilMonev.HighLightInformasiDomainShpnre', [
            'tabs' => $tabs,

        ]);
    }

    public function store(HighLightInformasiDomainShpnreRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = HighLightInformasiDomainShpnre::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = HighLightInformasiDomainShpnre::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->orderBy('no', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(HighLightInformasiDomainShpnreRequest $request, $id)
    {
        $progress = HighLightInformasiDomainShpnre::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = HighLightInformasiDomainShpnre::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
