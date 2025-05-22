<?php

namespace App\Http\Controllers\SHG\InputDataMonev\widarMandripa;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\WidarMandripa\AvailabilityWmnRequest;
use App\Models\SHG\WidarMandripa\AvailabilityWmn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvailabilityWmnController extends Controller
{
    public function index()
    {
        $tabs = [
            [
                'title' => 'Status Asset 2025 AI WMN',
                'route' => route('widar-mandripa-nusantara'),
                'active' => request()->routeIs('widar-mandripa-nusantara'),
            ],
            [
                'title' => 'Mandatory Certification WMN',
                'route' => route('mandatory-certification-wmn'),
                'active' => request()->routeIs('mandatory-certification-wmn'),
            ],
            [
                'title' => 'Asset Breakdown WMN',
                'route' => route('asset-breakdown-wmn'),
                'active' => request()->routeIs('asset-breakdown-wmn'),
            ],
            [
                'title' => 'Status PLO WMN',
                'route' => route('status-plo-wmn'),
                'active' => request()->routeIs('status-plo-wmn'),
            ],
            [
                'title' => 'Pelatihan AIMS WMN',
                'route' => route('pelatihan-aims-wmn'),
                'active' => request()->routeIs('pelatihan-aims-wmn'),
            ],
            [
                'title' => 'Kondisi Vacant AIMS WMN',
                'route' => route('kondisi-vacant-aims-wmn'),
                'active' => request()->routeIs('kondisi-vacant-aims-wmn'),
            ],
            [
                'title' => 'Rencana Pemeliharaan WMN',
                'route' => route('rencana-pemeliharaan-wmn'),
                'active' => request()->routeIs('rencana-pemeliharaan-wmn'),
            ],
            [
                'title' => 'Sistem Informasi AIMS WMN',
                'route' => route('sistem-informasi-aims-wmn'),
                'active' => request()->routeIs('sistem-informasi-aims-wmn'),
            ],
            [
                'title' => 'Availability WMN',
                'route' => route('availability-wmn'),
                'active' => request()->routeIs('availability-wmn'),
            ],
            [
                'title' => 'Air Budget Tagging WMN',
                'route' => route('air-budget-tagging-wmn'),
                'active' => request()->routeIs('air-budget-tagging-wmn'),
            ],
            [
                'title' => 'Realisasi Anggaran AI WMN',
                'route' => route('realisasi-anggaran-ai-wmn'),
                'active' => request()->routeIs('realisasi-anggaran-ai-wmn'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI WMN',
                'route' => route('realisasi-progress-fisik-ai-wmn'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-wmn'),
            ],
        ];

        return view('SHG.InputDataMonev.WidarMandripaNusantara.AvailabilityWMN', compact('tabs'));
    }

    public function data()
    {
        // return response()->json(AvailabilityWmn::all());
        $TargetPLO = AvailabilityWmn::select('*')
            ->addSelect(DB::raw("
            STR_TO_DATE(CONCAT('01-', periode), '%d-%b-%Y') as periode_date
        "))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(AvailabilityWmnRequest $request)
    {
        $data = $request->validated();
        $data = AvailabilityWmn::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(AvailabilityWmnRequest $request, $id)
    {
        $progress = AvailabilityWmn::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = AvailabilityWmn::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
