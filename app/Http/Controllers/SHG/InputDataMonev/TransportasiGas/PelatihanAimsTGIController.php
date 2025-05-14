<?php

namespace App\Http\Controllers\SHG\InputDataMonev\TransportasiGas;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\TransportasiGas\PelatihanAimsTGIRequest;
use App\Models\SHG\TransportasiGas\PelatihanAimsTGI;
use Illuminate\Http\Request;

class PelatihanAimsTGIController extends Controller
{

    public function index(Request $request)
    {

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

        return view('SHG.InputDataMonev.TransportasiGas.PelatihanAimsTGI', compact('tabs'));
    }

    public function store(PelatihanAimsTGIRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = PelatihanAimsTGI::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = PelatihanAimsTGI::all();
        return response()->json($TargetPLO);
    }
    public function update(PelatihanAimsTGIRequest $request, $id)
    {
        $progress = PelatihanAimsTGI::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = PelatihanAimsTGI::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
