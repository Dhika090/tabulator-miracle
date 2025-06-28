<?php

namespace App\Http\Controllers\SHG\InputDataMonev\TransportasiGas;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\TransportasiGas\StatusAssetAiTGIRequest;
use App\Models\SHG\TransportasiGas\StatusAssetAiTGI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiTGIController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiTGI::all();
            return response()->json($TargetPLO);
        }

        $companies = [
            'PGN',
            'PTG',
            'PTGN',
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
                'title' => 'Status Asset 2025 AI TGI',
                'route' => route('transportasi-gas-indonesia'),
                'active' => request()->routeIs('transportasi-gas-indonesia'),
            ],
            [
                'title' => 'Mandatory Certification TGI',
                'route' => route('mandatory-certification-tgi'),
                'active' => request()->routeIs('mandatory-certification-tgi'),
            ],
            [
                'title' => 'Asset Breakdown TGI',
                'route' => route('asset-breakdown-tgi'),
                'active' => request()->routeIs('asset-breakdown-tgi'),
            ],
            [
                'title' => 'Sistem Informasi AIMS TGI',
                'route' => route('sistem-informasi-aims-tgi'),
                'active' => request()->routeIs('sistem-informasi-aims-tgi'),
            ],
            [
                'title' => 'Rencana Pemeliharaan TGI',
                'route' => route('rencana-pemeliharaan-tgi'),
                'active' => request()->routeIs('rencana-pemeliharaan-tgi'),
            ],
            [
                'title' => 'Status PLO TGI',
                'route' => route('status-plo-tgi'),
                'active' => request()->routeIs('status-plo-tgi'),
            ],
            [
                'title' => 'Kondisi Vacant Fungsi AIMS TGI',
                'route' => route('kondisi-vacant-fungsi-aims-tgi'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-tgi'),
            ],
            [
                'title' => 'Pelatihan AIMS TGI',
                'route' => route('pelatihan-aims-tgi'),
                'active' => request()->routeIs('pelatihan-aims-tgi'),
            ],
            [
                'title' => 'Air Budget Tagging TGI',
                'route' => route('air-budget-tagging-tgi'),
                'active' => request()->routeIs('air-budget-tagging-tgi'),
            ],
            [
                'title' => 'Availability TGI',
                'route' => route('availability-tgi'),
                'active' => request()->routeIs('availability-tgi'),
            ],
            [
                'title' => 'Realisasi Anggaran AI TGI',
                'route' => route('realisasi-anggaran-ai-tgi'),
                'active' => request()->routeIs('realisasi-anggaran-ai-tgi'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI TGI',
                'route' => route('realisasi-progress-fisik-ai-tgi'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-tgi'),
            ],
        ];

        return view('SHG.InputDataMonev.TransportasiGas.StatusAssetAiTGI', compact('tabs', 'companies'));
    }

    public function data()
    {
        $TargetPLO = StatusAssetAiTGI::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }


    public function store(StatusAssetAiTGIRequest $request)
    {
        $data = $request->validated();
        $data = StatusAssetAiTGI::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(StatusAssetAiTGIRequest $request, $id)
    {
        $progress = StatusAssetAiTGI::findOrFail($id);

        $data = $request->validated();

        $intFields = [
            'jumlah',

            'sece_low_breakdown',
            'sece_medium_due_date_inspection',
            'sece_medium_low_condition',
            'sece_medium_low_performance',
            'sece_high',

            'pce_low_breakdown',
            'pce_medium_due_date_inspection',
            'pce_medium_low_condition',
            'pce_medium_low_performance',
            'pce_high',

            'important_low_breakdown',
            'important_medium_due_date_inspection',
            'important_medium_low_condition',
            'important_medium_low_performance',
            'important_high',

            'secondary_low_breakdown',
            'secondary_medium_due_date_inspection',
            'secondary_medium_low_condition',
            'secondary_medium_low_performance',
            'secondary_high',

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
        $target = StatusAssetAiTGI::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
