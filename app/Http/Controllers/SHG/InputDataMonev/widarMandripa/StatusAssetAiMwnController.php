<?php

namespace App\Http\Controllers\SHG\InputDataMonev\widarMandripa;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\WidarMandripa\StatusAsset2025AiWmnRequest;
use App\Models\SHG\WidarMadripa\StatusAsset2025AiWmn;
use App\Models\SHG\WidarMandripa\StatusAssetAiWmn;
use Illuminate\Http\Request;

class StatusAssetAiMwnController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiWmn::all();
            return response()->json($TargetPLO);
        }

        $companies = [
            'PGN',
            'PTG',
            'PTSG',
            'PGN, PAG, SAKA, WMP',
            'GEI',
            'TGI',
            'WMN',
            'PLI',
            'PDG',
            'KJG',
            'PAG',
            'NR'
        ];

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI WMN',
                'route' => route('widar-mandripa-nusantara'),
                'active' => request()->routeIs('widar-mandripa-nusantara'),
            ],
            [
                'title' => 'Mandatory Certification WMN',
                'route' => route('mandatory-certification-wmn'),
                'active' => request()->routeIs('mandatory-certification-wmn'),
            ],
            [
                'title' => 'Asset Breakdown WMN',
                'route' => route('asset-breakdown-wmn'),
                'active' => request()->routeIs('asset-breakdown-wmn'),
            ],
            [
                'title' => 'Status PLO WMN',
                'route' => route('status-plo-wmn'),
                'active' => request()->routeIs('status-plo-wmn'),
            ],
            [
                'title' => 'Pelatihan AIMS WMN',
                'route' => route('pelatihan-aims-wmn'),
                'active' => request()->routeIs('pelatihan-aims-wmn'),
            ],
            [
                'title' => 'Kondisi Vacant AIMS WMN',
                'route' => route('kondisi-vacant-aims-wmn'),
                'active' => request()->routeIs('kondisi-vacant-aims-wmn'),
            ],
            [
                'title' => 'Rencana Pemeliharaan WMN',
                'route' => route('rencana-pemeliharaan-wmn'),
                'active' => request()->routeIs('rencana-pemeliharaan-wmn'),
            ],
            [
                'title' => 'Sistem Informasi AIMS WMN',
                'route' => route('sistem-informasi-aims-wmn'),
                'active' => request()->routeIs('sistem-informasi-aims-wmn'),
            ],
            [
                'title' => 'Availability WMN',
                'route' => route('availability-wmn'),
                'active' => request()->routeIs('availability-wmn'),
            ],
            [
                'title' => 'Air Budget Tagging WMN',
                'route' => route('air-budget-tagging-wmn'),
                'active' => request()->routeIs('air-budget-tagging-wmn'),
            ],
            [
                'title' => 'Realisasi Anggaran AI WMN',
                'route' => route('realisasi-anggaran-ai-wmn'),
                'active' => request()->routeIs('realisasi-anggaran-ai-wmn'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI WMN',
                'route' => route('realisasi-progress-fisik-ai-wmn'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-wmn'),
            ],
        ];
        return view('SHG.InputDataMonev.WidarMandripaNusantara', compact('tabs', 'companies'));
    }

    public function store(StatusAsset2025AiWmnRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = StatusAssetAiWmn::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = StatusAssetAiWmn::all();
        return response()->json($TargetPLO);
    }
   public function update(StatusAsset2025AiWmnRequest $request, $id)
    {
        $progress = StatusAssetAiWmn::findOrFail($id);

        $data = $request->validated();

        $intFields = [
            'jumlah',

            'sece_low_integrity_breakdown',
            'sece_medium_due_date_inspection',
            'sece_medium_low_condition',
            'sece_medium_low_performance',
            'sece_high_integrity',

            'pce_low_integrity_breakdown',
            'pce_medium_due_date_inspection',
            'pce_medium_low_condition',
            'pce_medium_low_performance',
            'pce_high_integrity',

            'important_low_integrity_breakdown',
            'important_medium_due_date_inspection',
            'important_medium_low_condition',
            'important_medium_low_performance',
            'important_high_integrity',

            'secondary_low_integrity_breakdown',
            'secondary_medium_due_date_inspection',
            'secondary_medium_low_condition',
            'secondary_medium_low_performance',
            'secondary_high_integrity',

            'kegiatan_penurunan_low',
            'kegiatan_penurunan_med',
        ];

        foreach ($intFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = (int) $data[$field];
            }
        }
        $progress->update($data);

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = StatusAssetAiWmn::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
