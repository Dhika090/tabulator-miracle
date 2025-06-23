<?php

namespace App\Http\Controllers\SHG\InputDataMonev;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataMonevPertaminaGasRequest;
use App\Models\DataMonevPertaminaGas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertaminaGasController extends Controller
{
    public function index()
    {
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
        // return view('SHG.InputDataMonev.PertaminaGas', compact('companies'));
        $tabs = [
            [
                'title' => 'Status Asset 2025 AI 2025 PTG',
                'route' => route('pertamina-gas'),
                'active' => request()->routeIs('pertamina-gas'),
            ],
            [
                'title' => 'Mandatory Certification PTG',
                'route' => route('mandatory-certification-ptg'),
                'active' => request()->routeIs('mandatory-certification-ptg'),
            ],
            [
                'title' => 'SAP Asset PTG',
                'route' => route('sap-asset-ptg'),
                'active' => request()->routeIs('sap-asset-ptg'),
            ],
            [
                'title' => 'Status PLO PTG',
                'route' => route('status-plo-ptg'),
                'active' => request()->routeIs('status-plo-ptg'),
            ],
            [
                'title' => 'Asset Breakdown PTG',
                'route' => route('asset-breakdown-ptg'),
                'active' => request()->routeIs('asset-breakdown-ptg'),
            ],
            [
                'title' => 'Kondisi Vacant Fungsi AIMS PTG',
                'route' => route('kondisi-vacant-fungsi-aims-ptg'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-ptg'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Besar PTG',
                'route' => route('rencana-pemeliharaan-besar-ptg'),
                'active' => request()->routeIs('rencana-pemeliharaan-besar-ptg'),
            ],
            [
                'title' => 'Sistem Informasi AIMS PTG',
                'route' => route('sistem-informasi-aims-ptg'),
                'active' => request()->routeIs('sistem-informasi-aims-ptg'),
            ],
            [
                'title' => 'Pelatihan AIMS PTG',
                'route' => route('pelatihan-aims-ptg'),
                'active' => request()->routeIs('pelatihan-aims-ptg'),
            ],
            [
                'title' => 'Realisasi Anggaran AI 2025 PTG',
                'route' => route('realisasi-anggaran-ai-ptg'),
                'active' => request()->routeIs('realisasi-anggaran-ai-ptg'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PTG 2025',
                'route' => route('realisasi-progress-fisik-ai-ptg'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-ptg'),
            ],
            [
                'title' => 'Availability PTG',
                'route' => route('availability-ptg'),
                'active' => request()->routeIs('availability-ptg'),
            ],
            [
                'title' => 'AIR BUDGET TAGGING PTG',
                'route' => route('air-budget-tagging-ptg'),
                'active' => request()->routeIs('air-budget-tagging-ptg'),
            ],
        ];

        return view('SHG.InputDataMonev.PertaminaGas', compact('tabs', 'companies'));
    }

    public function data()
    {
        $TargetPLO = DB::table('shg_pertamina_status_asset_ai')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(DataMonevPertaminaGasRequest $request)
    {
        $data = $request->validated();
        $data = DataMonevPertaminaGas::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }


    public function update(DataMonevPertaminaGasRequest $request, $id)
    {
        $progress = DataMonevPertaminaGas::findOrFail($id);

        $data = $request->validated();

        // Convert semua field decimal yang harus disimpan sebagai int
        if (isset($data['kegiatan_penurunan_low'])) {
            $data['kegiatan_penurunan_low'] = intval($data['kegiatan_penurunan_low']);
        }

        if (isset($data['kegiatan_penurunan_med'])) {
            $data['kegiatan_penurunan_med'] = intval($data['kegiatan_penurunan_med']);
        }

        // Tambahkan juga jika ada field serupa lainnya

        $progress->update($data);

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = DataMonevPertaminaGas::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
