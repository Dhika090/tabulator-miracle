<?php

namespace App\Http\Controllers\SHIML\InputDataMonev\Pis;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHIML\Pis\KondisiVacantAimsPisRequest;
use App\Models\SHIML\Pis\KondisiVacantAimsPis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KondisiVacantAimsPisController extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI   PIS',
                'route' => route('pis'),
                'active' => request()->routeIs('pis'),
            ],
            [
                'title' => 'Asset Breakdown   PIS',
                'route' => route('asset-breakdown-pis'),
                'active' => request()->routeIs('asset-breakdown-pis'),
            ],
            [
                'title' => 'Availability   PIS',
                'route' => route('availability-pis'),
                'active' => request()->routeIs('availability-pis'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims   PIS',
                'route' => route('kondisi-vacant-aims-pis'),
                'active' => request()->routeIs('kondisi-vacant-aims-pis'),
            ],
            [
                'title' => 'Mandatory Certification   PIS',
                'route' => route('mandatory-certification-pis'),
                'active' => request()->routeIs('mandatory-certification-pis'),
            ],
            [
                'title' => 'Pelatihan Aims   PIS',
                'route' => route('pelatihan-aims-pis'),
                'active' => request()->routeIs('pelatihan-aims-pis'),
            ],
            [
                'title' => 'Rencana Pemeliharaan   PIS',
                'route' => route('rencana-pemeliharaan-pis'),
                'active' => request()->routeIs('rencana-pemeliharaan-pis'),
            ],
            [
                'title' => 'Real Anggaran AI   PIS',
                'route' => route('real-anggaran-ai-pis'),
                'active' => request()->routeIs('real-anggaran-ai-pis'),
            ],
            [
                'title' => 'Real Anggaran Figure   PIS',
                'route' => route('real-anggaran-figure-pis'),
                'active' => request()->routeIs('real-anggaran-figure-pis'),
            ],
            [
                'title' => 'Real Prog Fisik   PIS',
                'route' => route('real-prog-fisik-pis'),
                'active' => request()->routeIs('real-prog-fisik-pis'),
            ],
            [
                'title' => 'Sistem Informasi Aims   PIS',
                'route' => route('sistem-informasi-aims-pis'),
                'active' => request()->routeIs('sistem-informasi-aims-pis'),
            ],
            [
                'title' => 'Status PLO PIS',
                'route' => route('status-plo-pis'),
                'active' => request()->routeIs('status-plo-pis'),
            ],
            [
                'title' => 'SAP Asset PIS',
                'route' => route('sap-asset-pis'),
                'active' => request()->routeIs('sap-asset-pis'),
            ],


        ];
        return view('SHIML.InputDataMonev.Pis.KondisiVacantAimsPis', compact('tabs'));
    }

    public function store(KondisiVacantAimsPisRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = KondisiVacantAimsPis::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = KondisiVacantAimsPis::select('*')
            ->addSelect(DB::raw("
            STR_TO_DATE(CONCAT('0-', periode), '%d-%b-%Y') as periode_date
        "))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(KondisiVacantAimsPisRequest $request, $id)
    {
        $progress = KondisiVacantAimsPis::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = KondisiVacantAimsPis::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
