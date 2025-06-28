<?php

namespace App\Http\Controllers\SHG\InputDataMonev;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PertaSamtan\StatusAssetAIPTSGRequest;
use App\Models\SHG\PertaSamtan\StatusAssetAIPTSG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertaSamtanGasController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAIPTSG::all();
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
                'title' => 'Status Asset 2025 AI 2025 PTSG',
                'route' => route('perta-samtan-gas'),
                'active' => request()->routeIs('perta-samtan-gas'),
            ],
            [
                'title' => 'Mandatory Certification PTSG',
                'route' => route('mandatory-certification-ptsg'),
                'active' => request()->routeIs('mandatory-certification-ptsg'),
            ],
            [
                'title' => 'Asset Breakdown PTSG',
                'route' => route('asset-breakdown-ptsg'),
                'active' => request()->routeIs('asset-breakdown-ptsg'),
            ],
            [
                'title' => 'Status PLO PTSG',
                'route' => route('status-plo-ptsg'),
                'active' => request()->routeIs('status-plo-ptsg'),
            ],
            [
                'title' => 'Kondisi Vacant Fungsi AIMS PTSG',
                'route' => route('kondisi-vacant-fungsi-aims-ptsg'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-ptsg'),
            ],
            [
                'title' => 'Pelatihan AIMS PTSG',
                'route' => route('pelatihan-aims-ptsg'),
                'active' => request()->routeIs('pelatihan-aims-ptsg'),
            ],
            [
                'title' => 'Sistem Informasi AIMS ptsg',
                'route' => route('sistem-informasi-aims-ptsg'),
                'active' => request()->routeIs('sistem-informasi-aims-ptsg'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Besar PTSG 2025',
                'route' => route('rencana-pemeliharaan-besar-ptsg'),
                'active' => request()->routeIs('rencana-pemeliharaan-besar-ptsg'),
            ],
            [
                'title' => 'Availability PTSG',
                'route' => route('availability-ptsg'),
                'active' => request()->routeIs('availability-ptsg'),
            ],
            [
                'title' => 'Realisasi Progress Anggaran AI PTSG 2025',
                'route' => route('realisasi-anggaran-ai-ptsg'),
                'active' => request()->routeIs('realisasi-anggaran-ai-ptsg'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PTSG 2025',
                'route' => route('realisasi-progress-fisik-ai-ptsg'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-ptsg'),
            ],
        ];

        return view('SHG.InputDataMonev.PertaSamtanGas', compact('tabs', 'companies'));
    }


    public function store(StatusAssetAIPTSGRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = StatusAssetAIPTSG::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = StatusAssetAIPTSG::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(StatusAssetAIPTSGRequest $request, $id)
    {
        $progress = StatusAssetAIPTSG::findOrFail($id);

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
        $target = StatusAssetAIPTSG::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
