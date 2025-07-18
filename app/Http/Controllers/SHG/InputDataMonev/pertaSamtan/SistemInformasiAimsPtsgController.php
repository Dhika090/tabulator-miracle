<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertaSamtan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PertaSamtan\SistemInformasiAimsPtsgRequest;
use App\Models\SHG\PertaSamtan\SistemInformasiAimsPtsg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SistemInformasiAimsPtsgController extends Controller
{

    public function index()
    {
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
                'title' => 'Sistem Informasi AIMS PTSG',
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

        return view('SHG.InputDataMonev.pertaSamtan.SistemInformasiAimsPTSG', compact('tabs'));
    }

    public function data()
    {
        return response()->json(SistemInformasiAimsPtsg::all());
    }

    public function store(SistemInformasiAimsPtsgRequest $request)
    {
        $data = $request->validated();
        $data = SistemInformasiAimsPtsg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(SistemInformasiAimsPtsgRequest $request, $id)
    {
        $progress = SistemInformasiAimsPtsg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = SistemInformasiAimsPtsg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
