<?php

namespace App\Http\Controllers\SHG\InputDataMonev\WidarMandripa;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\WidarMandripa\StatusPLOWmnRequest;
use App\Models\SHG\WidarMandripa\StatusPLOWmn;
use Illuminate\Http\Request;

class StatusPloController extends Controller
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
                'title' => 'Plan Mandatory Certification',
                'route' => route('plan-mandatory-certification'),
                'active' => request()->routeIs('plan-mandatory-certification'),
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

        return view('SHG.InputDataMonev.WidarMandripaNusantara.StatusPLOWMN', compact('tabs'));
    }

    public function data()
    {
        return response()->json(StatusPLOWmn::all());
    }

    public function store(StatusPLOWmnRequest $request)
    {
        $data = $request->validated();
        $data = StatusPLOWmn::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(StatusPLOWmnRequest $request, $id)
    {
        $progress = StatusPLOWmn::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = StatusPLOWmn::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
