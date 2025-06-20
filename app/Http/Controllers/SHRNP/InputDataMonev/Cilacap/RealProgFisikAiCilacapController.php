<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Cilacap;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Cilacap\RealProgFisikAiCilacapRequest;
use App\Models\SHRNP\Cilacap\RealProgFisikAiCilacap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RealProgFisikAiCilacapController extends Controller
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

        return view('SHRNP.InputDataMonev.Cilacap.RealProgFisikAiCilacap', [
            'tabs' => $tabs,

        ]);
    }

    public function store(RealProgFisikAiCilacapRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RealProgFisikAiCilacap::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RealProgFisikAiCilacap::select('*')
            ->addSelect(DB::raw("
            STR_TO_DATE(CONCAT('0-', periode), '%d-%b-%Y') as periode_date
        "))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(RealProgFisikAiCilacapRequest $request, $id)
    {
        $progress = RealProgFisikAiCilacap::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RealProgFisikAiCilacap::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
