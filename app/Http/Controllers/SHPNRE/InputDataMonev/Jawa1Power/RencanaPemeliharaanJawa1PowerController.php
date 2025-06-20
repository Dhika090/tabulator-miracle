<?php

namespace App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\Jawa1Power\RencanaPemeliharaanJawa1PowerRequest;
use App\Models\SHPNRE\Jawa1Power\RencanaPemeliharaanJawa1Power;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RencanaPemeliharaanJawa1PowerController extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI Jawa 1 Power',
                'route' => route('jawa1power'),
                'active' => request()->routeIs('jawa1power'),
            ],
            [
                'title' => 'Asset Breakdown Jawa 1 Power',
                'route' => route('asset-breakdown-jawa1power'),
                'active' => request()->routeIs('asset-breakdown-jawa1power'),
            ],
            [
                'title' => 'Availability Jawa 1 Power',
                'route' => route('availability-jawa1power'),
                'active' => request()->routeIs('availability-jawa1power'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims Jawa 1 Power',
                'route' => route('kondisi-vacant-aims-jawa1power'),
                'active' => request()->routeIs('kondisi-vacant-aims-jawa1power'),
            ],
            [
                'title' => 'Mandatory Certification Jawa 1 Power',
                'route' => route('mandatory-certification-jawa1power'),
                'active' => request()->routeIs('mandatory-certification-jawa1power'),
            ],
            [
                'title' => 'Pelatihan Aims Jawa 1 Power',
                'route' => route('pelatihan-aims-jawa1power'),
                'active' => request()->routeIs('pelatihan-aims-jawa1power'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Jawa 1 Power',
                'route' => route('rencana-pemeliharaan-jawa1power'),
                'active' => request()->routeIs('rencana-pemeliharaan-jawa1power'),
            ],
            [
                'title' => 'Real Anggaran AI Jawa 1 Power',
                'route' => route('real-anggaran-ai-jawa1power'),
                'active' => request()->routeIs('real-anggaran-ai-jawa1power'),
            ],
            [
                'title' => 'Real Anggaran Figure Jawa 1 Power',
                'route' => route('real-anggaran-figure-jawa1power'),
                'active' => request()->routeIs('real-anggaran-figure-jawa1power'),
            ],
            [
                'title' => 'Real Prog Fisik Jawa 1 Power',
                'route' => route('real-prog-fisik-jawa1power'),
                'active' => request()->routeIs('real-prog-fisik-jawa1power'),
            ],
            [
                'title' => 'Sistem Informasi Aims Jawa 1 Power',
                'route' => route('sistem-informasi-aims-jawa1power'),
                'active' => request()->routeIs('sistem-informasi-aims-jawa1power'),
            ],
            [
                'title' => 'Summary PLO Jawa 1 Power',
                'route' => route('summary-plo-jawa1power'),
                'active' => request()->routeIs('summary-plo-jawa1power'),
            ],

        ];
        return view('SHPNRE.InputDataMonev.Jawa1Power.RencanaPemeliharaanJawa1Power', compact('tabs'));
    }

    public function store(RencanaPemeliharaanJawa1PowerRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RencanaPemeliharaanJawa1Power::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RencanaPemeliharaanJawa1Power::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(RencanaPemeliharaanJawa1PowerRequest $request, $id)
    {
        $progress = RencanaPemeliharaanJawa1Power::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RencanaPemeliharaanJawa1Power::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
