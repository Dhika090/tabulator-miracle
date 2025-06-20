<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PertaArunGas;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PertaArun\PelatihanAimsPAGRequest;
use App\Models\SHG\PertaArun\PelatihanAimsPAG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelatihanAimsPAGController extends Controller
{

    public function index()
    {
        $tabs = [
            [
                'title' => 'Status Asset 2025 AI PAG',
                'route' => route('perta-arun-gas'),
                'active' => request()->routeIs('perta-arun-gas'),
            ],
            [
                'title' => 'Mandatory Certification PAG',
                'route' => route('mandatory-certification-pag'),
                'active' => request()->routeIs('mandatory-certification-pag'),
            ],
            [
                'title' => 'Asset Breakdown PAG',
                'route' => route('asset-breakdown-pag'),
                'active' => request()->routeIs('asset-breakdown-pag'),
            ],
            [
                'title' => 'Status PLO PAG',
                'route' => route('status-plo-pag'),
                'active' => request()->routeIs('status-plo-pag'),
            ],
            [
                'title' => 'Kondisi Vacant Aims PAG',
                'route' => route('kondisi-vacant-aims-pag'),
                'active' => request()->routeIs('kondisi-vacant-aims-pag'),
            ],
            [
                'title' => 'Pelatihan Aims PAG',
                'route' => route('pelatihan-aims-pag'),
                'active' => request()->routeIs('pelatihan-aims-pag'),
            ],
            [
                'title' => 'Sistem Informasi Aims PAG',
                'route' => route('sistem-informasi-aims-pag'),
                'active' => request()->routeIs('sistem-informasi-aims-pag'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Besar PAG',
                'route' => route('rencana-pemeliharaan-pag'),
                'active' => request()->routeIs('rencana-pemeliharaan-pag'),
            ],
            [
                'title' => 'Availability PAG',
                'route' => route('availability-pag'),
                'active' => request()->routeIs('availability-pag'),
            ],
            [
                'title' => 'Realisasi Anggaran AI PAG',
                'route' => route('realisasi-anggaran-ai-pag'),
                'active' => request()->routeIs('realisasi-anggaran-ai-pag'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PAG',
                'route' => route('realisasi-progress-fisik-ai-pag'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-pag'),
            ],
            [
                'title' => 'Air Budget Tagging PAG',
                'route' => route('air-budget-tagging-pag'),
                'active' => request()->routeIs('air-budget-tagging-pag'),
            ],
        ];

        return view('SHG.InputDataMonev.PertaArun.PelatihanAimsPAG', compact('tabs'));
    }


    public function data()
    {
        $TargetPLO = PelatihanAimsPAG::select('*')
       ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(PelatihanAimsPAGRequest $request)
    {
        $data = $request->validated();
        $data = PelatihanAimsPAG::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(PelatihanAimsPAGRequest $request, $id)
    {
        $progress = PelatihanAimsPAG::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = PelatihanAimsPAG::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}