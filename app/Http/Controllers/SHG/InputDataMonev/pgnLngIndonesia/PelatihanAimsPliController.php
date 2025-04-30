<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PgnLngIndonesia\PelatihanAimsPLIRequest;
use App\Models\SHG\PgnLngIndonesia\PelatihanAimsPLI;
use Illuminate\Http\Request;

class PelatihanAimsPliController extends Controller
{

    public function index()
    {
        $tabs = [
            [
                'title' => 'Status Asset 2025 AI 2025 PLI',
                'route' => route('pgn-lng-indonesia'),
                'active' => request()->routeIs('pgn-lng-indonesia'),
            ],
            [
                'title' => 'Status PLO PLI',
                'route' => route('status-plo-pli'),
                'active' => request()->routeIs('status-plo-pli'),
            ],
            [
                'title' => 'Mandatory Certification PLI',
                'route' => route('mandatory-certification-pli'),
                'active' => request()->routeIs('mandatory-certification-pli'),
            ],
            [
                'title' => 'Asset Breakdown PLI',
                'route' => route('asset-breakdown-pli'),
                'active' => request()->routeIs('asset-breakdown-pli'),
            ],
            [
                'title' => 'Kondisi Vacant Fungsi AIMS PTSG',
                'route' => route('kondisi-vacant-fungsi-aims-pli'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-pli'),
            ],
            [
                'title' => 'Rencana Pemeliharaan PLI',
                'route' => route('rencana-pemeliharaan-besar-pli'),
                'active' => request()->routeIs('rencana-pemeliharaan-besar-pli'),
            ],
            [
                'title' => 'Sistem Informasi AIMS PLI',
                'route' => route('sistem-informasi-aims-pli'),
                'active' => request()->routeIs('sistem-informasi-aims-pli'),
            ],
            [
                'title' => 'Pelatihan AIMS PLI',
                'route' => route('pelatihan-aims-pli'),
                'active' => request()->routeIs('pelatihan-aims-pli'),
            ],
            [
                'title' => 'Realisasi Anggaran AI PLI',
                'route' => route('realisasi-anggaran-ai-pli'),
                'active' => request()->routeIs('realisasi-anggaran-ai-pli'),
            ],

        ];

        return view('SHG.InputDataMonev.pgnLngIndonesia.PelatihanAimsPLI', compact('tabs'));
    }

    public function data()
    {
        return response()->json(PelatihanAimsPLI::all());
    }

    public function store(PelatihanAimsPLIRequest $request)
    {
        $data = $request->validated();
        $data = PelatihanAimsPLI::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(PelatihanAimsPLIRequest $request, $id)
    {
        $progress = PelatihanAimsPLI::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = PelatihanAimsPLI::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
