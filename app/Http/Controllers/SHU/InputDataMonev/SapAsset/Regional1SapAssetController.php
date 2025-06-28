<?php

namespace App\Http\Controllers\SHU\InputDataMonev\SapAsset;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\SapAsset\Regional1SapAssetRequest;
use App\Models\SHU\SapAsset\Regional1SapAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional1SapAssetController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shu-sap-asset'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.SapAsset.Regional1SapAsset', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional1SapAssetRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional1SapAsset::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional1SapAsset::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional1SapAssetRequest $request, $id)
    {
        $progress = Regional1SapAsset::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional1SapAsset::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
