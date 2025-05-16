<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PgnGlsm;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PgnGlsm\RealisasiProgressFisikAiGLSMRequest;
use App\Models\SHG\PgnGlsm\RealisasiProgressFisikAiGLSM;
use Illuminate\Http\Request;

class RealisasiProgressFisikAiGlsmController extends Controller
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
        return view('SHG.InputDataMonev.PgnGlsm.RealisasiProgressFisikAIGLSM', compact('tabs'));
    }

    public function store(RealisasiProgressFisikAiGLSMRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RealisasiProgressFisikAiGLSM::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RealisasiProgressFisikAiGLSM::all();
        return response()->json($TargetPLO);
    }
    public function update(RealisasiProgressFisikAiGLSMRequest $request, $id)
    {
        $progress = RealisasiProgressFisikAiGLSM::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RealisasiProgressFisikAiGLSM::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
