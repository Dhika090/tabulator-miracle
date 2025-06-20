<?php

namespace App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Regas;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\Jawa1Regas\RencanaPemeliharaanJawa1RegasRequest;
use App\Models\SHPNRE\Jawa1Regas\RencanaPemeliharaanJawa1Regas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RencanaPemeliharaanJawa1RegasController extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI Jawa 1 Regas',
                'route' => route('jawa1regas'),
                'active' => request()->routeIs('jawa1regas'),
            ],
            [
                'title' => 'Asset Breakdown Jawa 1 Regas',
                'route' => route('asset-breakdown-jawa1regas'),
                'active' => request()->routeIs('asset-breakdown-jawa1regas'),
            ],
            [
                'title' => 'Availability Jawa 1 Regas',
                'route' => route('availability-jawa1regas'),
                'active' => request()->routeIs('availability-jawa1regas'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims Jawa 1 Regas',
                'route' => route('kondisi-vacant-aims-jawa1regas'),
                'active' => request()->routeIs('kondisi-vacant-aims-jawa1regas'),
            ],
            [
                'title' => 'Mandatory Certification Jawa 1 Regas',
                'route' => route('mandatory-certification-jawa1regas'),
                'active' => request()->routeIs('mandatory-certification-jawa1regas'),
            ],
            [
                'title' => 'Pelatihan Aims Jawa 1 Regas',
                'route' => route('pelatihan-aims-jawa1regas'),
                'active' => request()->routeIs('pelatihan-aims-jawa1regas'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Jawa 1 Regas',
                'route' => route('rencana-pemeliharaan-jawa1regas'),
                'active' => request()->routeIs('rencana-pemeliharaan-jawa1regas'),
            ],
            [
                'title' => 'Real Anggaran AI Jawa 1 Regas',
                'route' => route('real-anggaran-ai-jawa1regas'),
                'active' => request()->routeIs('real-anggaran-ai-jawa1regas'),
            ],
            [
                'title' => 'Real Anggaran Figure Jawa 1 Regas',
                'route' => route('real-anggaran-figure-jawa1regas'),
                'active' => request()->routeIs('real-anggaran-figure-jawa1regas'),
            ],
            [
                'title' => 'Real Prog Fisik Jawa 1 Regas',
                'route' => route('real-prog-fisik-jawa1regas'),
                'active' => request()->routeIs('real-prog-fisik-jawa1regas'),
            ],
            [
                'title' => 'Sistem Informasi Aims Jawa 1 Regas',
                'route' => route('sistem-informasi-aims-jawa1regas'),
                'active' => request()->routeIs('sistem-informasi-aims-jawa1regas'),
            ],
            [
                'title' => 'Summary PLO Jawa 1 Regas',
                'route' => route('summary-plo-jawa1regas'),
                'active' => request()->routeIs('summary-plo-jawa1regas'),
            ],

        ];
        return view('SHPNRE.InputDataMonev.Jawa1Regas.RencanaPemeliharaanJawa1Regas', compact('tabs'));
    }

    public function store(RencanaPemeliharaanJawa1RegasRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RencanaPemeliharaanJawa1Regas::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RencanaPemeliharaanJawa1Regas::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(RencanaPemeliharaanJawa1RegasRequest $request, $id)
    {
        $progress = RencanaPemeliharaanJawa1Regas::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RencanaPemeliharaanJawa1Regas::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
