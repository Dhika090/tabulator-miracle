<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Cilacap;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Cilacap\SapAssetCilacapRequest;
use App\Models\SHRNP\Cilacap\SapAssetCilacap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SapAssetCilacapController extends Controller
{
    

    public function index(Request $request)
    {
        $tabs = collect(config('cilacap-tabs'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']), // pakai nama route, bukan URL
            ];
        });

        return view('SHRNP.InputDataMonev.Cilacap.SapAssetCilacap', [
            'tabs' => $tabs,

        ]);
    }

    public function store(SapAssetCilacapRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = SapAssetCilacap::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = SapAssetCilacap::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(SapAssetCilacapRequest $request, $id)
    {
        $progress = SapAssetCilacap::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = SapAssetCilacap::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
