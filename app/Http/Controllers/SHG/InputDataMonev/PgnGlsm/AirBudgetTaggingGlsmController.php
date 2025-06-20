<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PgnGlsm;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PgnGlsm\AirBudgetTaggingGLSMRequest;
use App\Models\SHG\PgnGlsm\AirBudgetTaggingGLSM;
use Illuminate\Http\Request;

class AirBudgetTaggingGlsmController extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Realisasi Anggaran AI PGN GLSM ',
                'route' => route('realisasi-anggaran-ai-glsm'),
                'active' => request()->routeIs('realisasi-anggaran-ai-glsm'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PGN GLSM ',
                'route' => route('realisasi-progress-fisik-ai-glsm'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-glsm'),
            ],
            [
                'title' => 'Air Budget Tagging PGN GLSM ',
                'route' => route('air-budget-tagging-glsm'),
                'active' => request()->routeIs('air-budget-tagging-glsm'),
            ],
        ];

        return view('SHG.InputDataMonev.PgnGlsm.AirBudgetTaggingGLSM', compact('tabs'));
    }

    public function store(AirBudgetTaggingGLSMRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = AirBudgetTaggingGLSM::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = AirBudgetTaggingGLSM::all();
        return response()->json($TargetPLO);
    }
    public function update(AirBudgetTaggingGLSMRequest $request, $id)
    {
        $progress = AirBudgetTaggingGLSM::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = AirBudgetTaggingGLSM::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
