<?php

namespace App\Http\Controllers\SHG\InputDataMonev\widarMandripa;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\widarMandripa\KondisiVacantAimsWmnRequest;
use App\Models\SHG\widarMandripa\KondisiVacantAimsWmn;
use Illuminate\Http\Request;

class KondisiVacantAimsWmnController extends Controller
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

        return view('SHG.InputDataMonev.widarMandripaNusantara.KondisiVacantFungsiAimsWMN', compact('tabs'));
    }

    public function data()
    {
        return response()->json(KondisiVacantAimsWmn::all());
    }

    public function store(KondisiVacantAimsWmnRequest $request)
    {
        $data = $request->validated();
        $data = KondisiVacantAimsWmn::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(KondisiVacantAimsWmnRequest $request, $id)
    {
        $progress = KondisiVacantAimsWmn::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = KondisiVacantAimsWmn::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
