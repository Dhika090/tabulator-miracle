<?php

namespace App\Http\Controllers\SHU\TargetKinerja\TindakLanjutMonev;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\TargetKinerja\TindakLanjut\HighlightInformasiDomainRequest;
use App\Models\SHU\TargetKinerja\TindakLanjut\HighlightInformasiDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HighlightInformasiDomainShuController extends Controller
{
    public function index()
    {
        $tabs = [
            [
                'title' => 'Tindak Lanjut Monev SHU',
                'route' => route('tindak-lanjut-monev-shu'),
                'active' => request()->routeIs('tindak-lanjut-monev-shu'),
            ],
            [
                'title' => 'Highlight Status Ai',
                'route' => route('highlight-status-ai-shu'),
                'active' => request()->routeIs('highlight-status-ai-shu'),
            ],
            [
                'title' => 'HighLight Status Plo',
                'route' => route('highlight-status-plo-shu'),
                'active' => request()->routeIs('highlight-status-plo-shu'),
            ],
            [
                'title' => 'HighLight Informasi Domain',
                'route' => route('highlight-informasi-domain-shu'),
                'active' => request()->routeIs('highlight-informasi-domain-shu'),
            ],
            [
                'title' => 'HighLight Realisasi Aims',
                'route' => route('highlight-realisasi-aims-shu'),
                'active' => request()->routeIs('highlight-realisasi-aims-shu'),
            ],
            [
                'title' => 'HighLight Mandatory Certification',
                'route' => route('highlight-mandatory-certification-shu'),
                'active' => request()->routeIs('highlight-mandatory-certification-shu'),
            ],
        ];

        return view('SHU.TargetKinerja.TindakLanjutMonev.HighlightInformasiDomain', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = HighlightInformasiDomain::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(HighlightInformasiDomainRequest $request)
    {
        $data = $request->validated();
        $data = HighlightInformasiDomain::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }


    public function update(HighlightInformasiDomainRequest $request, $id)
    {
        $progress = HighlightInformasiDomain::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = HighlightInformasiDomain::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
