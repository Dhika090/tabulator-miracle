<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Cilacap;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Cilacap\AssetBreakdownCilacapRequest;
use App\Models\SHRNP\Cilacap\AssetBreakdownCilacap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetBreakdownCilacapController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('cilacap-tabs'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']), 
            ];
        });

        return view('SHRNP.InputDataMonev.Cilacap.AssetBreakdownCilacap', [
            'tabs' => $tabs,
            
        ]);
    }

    public function store(AssetBreakdownCilacapRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = AssetBreakdownCilacap::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = AssetBreakdownCilacap::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(AssetBreakdownCilacapRequest $request, $id)
    {
        $progress = AssetBreakdownCilacap::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = AssetBreakdownCilacap::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
