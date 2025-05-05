<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PertaArunGas;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PertaArun\KondisiVacantAimsPAGRequest;
use App\Http\Requests\SHG\PertaArun\KondisiVacantAimsRequest;
use App\Models\SHG\PertaArun\KondisiVacantAimsPAG;
use Illuminate\Http\Request;

class KondisiVacantAimsPAGController extends Controller
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

        ];

        return view('SHG.InputDataMonev.PertaArun.KondisiVacantFungsiAimsPAG', compact('tabs'));
    }


    public function data()
    {
        return response()->json(KondisiVacantAimsPAG::all());
    }


    public function store(KondisiVacantAimsPAGRequest $request)
    {
        $data = $request->validated();
        $data = KondisiVacantAimsPAG::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(KondisiVacantAimsPAGRequest $request, $id)
    {
        $progress = KondisiVacantAimsPAG::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = KondisiVacantAimsPAG::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
