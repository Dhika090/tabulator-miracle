<?php

namespace App\Http\Controllers\SHG\InputDataMonev\NusantaraRegas;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\NusantaraRegas\StatusPloNRReuqest;
use App\Models\SHG\NusantaraRegas\StatusPloNR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusPloNRController extends Controller
{
    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI NR',
                'route' => route('nusantara-regas'),
                'active' => request()->routeIs('nusantara-regas'),
            ],
            [
                'title' => 'Mandatory Certification NR',
                'route' => route('mandatory-certification-nr'),
                'active' => request()->routeIs('mandatory-certification-nr'),
            ],
            [
                'title' => 'Asset Breakdown NR',
                'route' => route('asset-breakdown-nr'),
                'active' => request()->routeIs('asset-breakdown-nr'),
            ],
            [
                'title' => 'Status PLO NR',
                'route' => route('status-plo-nr'),
                'active' => request()->routeIs('status-plo-nr'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims NR',
                'route' => route('kondisi-vacant-fungsi-aims-nr'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-nr'),
            ],
            [
                'title' => 'Pelatihan Aims NR',
                'route' => route('pelatihan-aims-nr'),
                'active' => request()->routeIs('pelatihan-aims-nr'),
            ],
            [
                'title' => 'Rencana Pemeliharaan NR',
                'route' => route('rencana-pemeliharaan-nr'),
                'active' => request()->routeIs('rencana-pemeliharaan-nr'),
            ],
            [
                'title' => 'Sistem Informasi Aims NR',
                'route' => route('sistem-informasi-aims-nr'),
                'active' => request()->routeIs('sistem-informasi-aims-nr'),
            ],
            [
                'title' => 'Availability NR',
                'route' => route('availability-nr'),
                'active' => request()->routeIs('availability-nr'),
            ],
            [
                'title' => 'Air Budget Tagging NR',
                'route' => route('air-budget-tagging-nr'),
                'active' => request()->routeIs('air-budget-tagging-nr'),
            ],
        ];

        return view('SHG.InputDataMonev.NusantaraRegas.StatusPloNR', compact('tabs'));
    }

    public function store(StatusPloNRReuqest $request)
    {
        $validated = $request->validated();
        $TargetPLO = StatusPloNR::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = StatusPloNR::select('*')
            ->addSelect(DB::raw("
            STR_TO_DATE(CONCAT('01-', periode), '%d-%b-%Y') as periode_date
        "))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(StatusPloNRReuqest $request, $id)
    {
        $progress = StatusPloNR::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = StatusPloNR::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
