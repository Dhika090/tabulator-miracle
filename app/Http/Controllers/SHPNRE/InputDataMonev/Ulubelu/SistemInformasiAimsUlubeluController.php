<?php

namespace App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\Ulubelu\SistemInformasiAimsUlubeluRequest;
use App\Models\SHPNRE\Ulubelu\SistemInformasiAimsUlubelu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SistemInformasiAimsUlubeluController extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI Ulubelu',
                'route' => route('ulubelu'),
                'active' => request()->routeIs('ulubelu'),
            ],
            [
                'title' => 'Asset Breakdown Ulubelu',
                'route' => route('asset-breakdown-ulubelu'),
                'active' => request()->routeIs('asset-breakdown-ulubelu'),
            ],
            [
                'title' => 'Availability Ulubelu',
                'route' => route('availability-ulubelu'),
                'active' => request()->routeIs('availability-ulubelu'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims Ulubelu',
                'route' => route('kondisi-vacant-aims-ulubelu'),
                'active' => request()->routeIs('kondisi-vacant-aims-ulubelu'),
            ],
            [
                'title' => 'Mandatory Certification Aims Lumut Balai',
                'route' => route('mandatory-certification-ulubelu'),
                'active' => request()->routeIs('mandatory-certification-ulubelu'),
            ],
            [
                'title' => 'Pelatihan Aims Ulubelu',
                'route' => route('pelatihan-aims-ulubelu'),
                'active' => request()->routeIs('pelatihan-aims-ulubelu'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Ulubelu',
                'route' => route('rencana-pemeliharaan-ulubelu'),
                'active' => request()->routeIs('rencana-pemeliharaan-ulubelu'),
            ],
            [
                'title' => 'Real Anggaran AI Ulubelu',
                'route' => route('real-anggaran-ai-ulubelu'),
                'active' => request()->routeIs('real-anggaran-ai-ulubelu'),
            ],
            [
                'title' => 'Real Anggaran Figure Ulubelu',
                'route' => route('real-anggaran-figure-ulubelu'),
                'active' => request()->routeIs('real-anggaran-figure-ulubelu'),
            ],
            [
                'title' => 'Realisasi Prog Fisik Ulubelu',
                'route' => route('real-prog-fisik-ulubelu'),
                'active' => request()->routeIs('real-prog-fisik-ulubelu'),
            ],
            [
                'title' => 'Sistem Informasi Aims Ulubelu',
                'route' => route('sistem-informasi-aims-ulubelu'),
                'active' => request()->routeIs('sistem-informasi-aims-ulubelu'),
            ],
            [
                'title' => 'Summary PLO Ulubelu',
                'route' => route('summary-plo-ulubelu'),
                'active' => request()->routeIs('summary-plo-ulubelu'),
            ],
            [
                'title' => 'SAP Asset Ulubelu',
                'route' => route('sap-asset-ulubelu'),
                'active' => request()->routeIs('sap-asset-ulubelu'),
            ]
        ];
        return view('SHPNRE.InputDataMonev.Ulubelu.SistemInformasiAimsUlubelu', compact('tabs'));
    }

    public function store(SistemInformasiAimsUlubeluRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = SistemInformasiAimsUlubelu::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = SistemInformasiAimsUlubelu::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(SistemInformasiAimsUlubeluRequest $request, $id)
    {
        $progress = SistemInformasiAimsUlubelu::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = SistemInformasiAimsUlubelu::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
