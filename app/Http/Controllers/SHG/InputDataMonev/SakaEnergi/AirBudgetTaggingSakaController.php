<?php

namespace App\Http\Controllers\SHG\InputDataMonev\SakaEnergi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\SakaEnergi\AirBudgetTaggingSakaRequest;
use App\Models\SHG\SakaEnergi\AirBudgetTaggingSAKA;
use Illuminate\Http\Request;

class AirBudgetTaggingSakaController extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI SAKA',
                'route' => route('saka-energi-indonesia'),
                'active' => request()->routeIs('saka-energi-indonesia'),
            ],
            [
                'title' => 'Asset Breakdown Saka',
                'route' => route('asset-breakdown-saka'),
                'active' => request()->routeIs('asset-breakdown-saka'),
            ],
            [
                'title' => 'Status PLO Saka',
                'route' => route('status-plo-saka'),
                'active' => request()->routeIs('status-plo-saka'),
            ],
            [
                'title' => 'Mandatory Certification Saka',
                'route' => route('mandatory-certification-saka'),
                'active' => request()->routeIs('mandatory-certification-saka'),
            ],
            [
                'title' => 'Kondisi Vacant Aims Saka',
                'route' => route('kondisi-vacant-aims-saka'),
                'active' => request()->routeIs('kondisi-vacant-aims-saka'),
            ],
            [
                'title' => 'Pelatihan Aims Saka',
                'route' => route('pelatihan-aims-saka'),
                'active' => request()->routeIs('pelatihan-aims-saka'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Besar Saka',
                'route' => route('rencana-pemeliharaan-saka'),
                'active' => request()->routeIs('rencana-pemeliharaan-saka'),
            ],
            [
                'title' => 'Sistem Informasi Aims Saka',
                'route' => route('sistem-informasi-aims-saka'),
                'active' => request()->routeIs('sistem-informasi-aims-saka'),
            ],
            [
                'title' => 'Availability Saka',
                'route' => route('availability-saka'),
                'active' => request()->routeIs('availability-saka'),
            ],
            [
                'title' => 'Air Budget Tagging Saka',
                'route' => route('air-budget-tagging-saka'),
                'active' => request()->routeIs('air-budget-tagging-saka'),
            ],
            [
                'title' => 'Realisasi Anggaran AI Saka',
                'route' => route('realisasi-anggaran-ai-saka'),
                'active' => request()->routeIs('realisasi-anggaran-ai-saka'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI Saka',
                'route' => route('realisasi-progress-fisik-ai-saka'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-saka'),
            ],
        ];

        return view('SHG.InputDataMonev.SakaEnergi.AirBudgetTaggingSaka', compact('tabs'));
    }

    public function store(AirBudgetTaggingSakaRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = AirBudgetTaggingSAKA::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = AirBudgetTaggingSAKA::all();
        return response()->json($TargetPLO);
    }
    public function update(AirBudgetTaggingSakaRequest $request, $id)
    {
        $progress = AirBudgetTaggingSAKA::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = AirBudgetTaggingSAKA::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
