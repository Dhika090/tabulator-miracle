<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PertagasNiaga\RealisasiAnggaranAiPTGNRequest;
use App\Models\SHG\PertagasNiaga\RealisasiAnggaranAiPTGN;
use Illuminate\Http\Request;

class RealisasiAnggaranAiPTGNController extends Controller
{
    
    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI PTGN',
                'route' => route('pertagas-niaga'),
                'active' => request()->routeIs('pertagas-niaga'),
            ],
            [
                'title' => 'Mandatory Certification PTGN',
                'route' => route('mandatory-certification-ptgn'),
                'active' => request()->routeIs('mandatory-certification-ptgn'),
            ],
            [
                'title' => 'Asset Breakdown PTGN',
                'route' => route('asset-breakdown-ptgn'),
                'active' => request()->routeIs('asset-breakdown-ptgn'),
            ],
            [
                'title' => 'Status PLO PTGN',
                'route' => route('status-plo-ptgn'),
                'active' => request()->routeIs('status-plo-ptgn'),
            ],
            [
                'title' => 'Kondisi Vacant Aims PTGN',
                'route' => route('kondisi-vacant-fungsi-aims-ptgn'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-ptgn'),
            ],
            [
                'title' => 'Sistem Informasi Aims PTGN',
                'route' => route('sistem-informasi-aims-ptgn'),
                'active' => request()->routeIs('sistem-informasi-aims-ptgn'),
            ],
            [
                'title' => 'Pelatihan Aims PTGN',
                'route' => route('pelatihan-aims-ptgn'),
                'active' => request()->routeIs('pelatihan-aims-ptgn'),
            ],
            [
                'title' => 'Rencana Pemeliharaan PTGN',
                'route' => route('rencana-pemeliharaan-ptgn'),
                'active' => request()->routeIs('rencana-pemeliharaan-ptgn'),
            ],
            [
                'title' => 'Availability PTGN',
                'route' => route('availability-ptgn'),
                'active' => request()->routeIs('availability-ptgn'),
            ],
            [
                'title' => 'Air Budget Tagging PTGN',
                'route' => route('air-budget-tagging-ptgn'),
                'active' => request()->routeIs('air-budget-tagging-ptgn'),
            ],
            [
                'title' => 'Realisasi Anggaran AI PTGN',
                'route' => route('realisasi-anggaran-ai-ptgn'),
                'active' => request()->routeIs('realisasi-anggaran-ai-ptgn'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PTGN',
                'route' => route('realisasi-progress-fisik-ai-ptgn'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-ptgn'),
            ],
        ];

        return view('SHG.InputDataMonev.pertagasNiaga.RealisasiAnggaranAiPTGN', compact('tabs'));
    }

    public function store(RealisasiAnggaranAiPTGNRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RealisasiAnggaranAiPTGN::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RealisasiAnggaranAiPTGN::all();
        return response()->json($TargetPLO);
    }
    public function update(RealisasiAnggaranAiPTGNRequest $request, $id)
    {
        $progress = RealisasiAnggaranAiPTGN::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RealisasiAnggaranAiPTGN::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
