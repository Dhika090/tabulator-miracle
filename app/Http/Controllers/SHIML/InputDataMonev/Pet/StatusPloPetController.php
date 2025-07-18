<?php

namespace App\Http\Controllers\SHIML\InputDataMonev\Pet;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHIML\Pet\StatusPloPetRequest;
use App\Models\SHIML\Pet\StatusPloPet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusPloPetController extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI PET',
                'route' => route('pet'),
                'active' => request()->routeIs('pet'),
            ],
            [
                'title' => 'Asset Breakdown PET',
                'route' => route('asset-breakdown-pet'),
                'active' => request()->routeIs('asset-breakdown-pet'),
            ],
            [
                'title' => 'Availability PET',
                'route' => route('availability-pet'),
                'active' => request()->routeIs('availability-pet'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims PET',
                'route' => route('kondisi-vacant-aims-pet'),
                'active' => request()->routeIs('kondisi-vacant-aims-pet'),
            ],
            [
                'title' => 'Mandatory Certification PET',
                'route' => route('mandatory-certification-pet'),
                'active' => request()->routeIs('mandatory-certification-pet'),
            ],
            [
                'title' => 'Pelatihan Aims PET',
                'route' => route('pelatihan-aims-pet'),
                'active' => request()->routeIs('pelatihan-aims-pet'),
            ],
            [
                'title' => 'Rencana Pemeliharaan PET',
                'route' => route('rencana-pemeliharaan-pet'),
                'active' => request()->routeIs('rencana-pemeliharaan-pet'),
            ],
            [
                'title' => 'Real Anggaran AI PET',
                'route' => route('real-anggaran-ai-pet'),
                'active' => request()->routeIs('real-anggaran-ai-pet'),
            ],
            [
                'title' => 'Real Anggaran Figure PET',
                'route' => route('real-anggaran-figure-pet'),
                'active' => request()->routeIs('real-anggaran-figure-pet'),
            ],
            [
                'title' => 'Real Prog Fisik PET',
                'route' => route('real-prog-fisik-pet'),
                'active' => request()->routeIs('real-prog-fisik-pet'),
            ],
            [
                'title' => 'Sistem Informasi Aims PET',
                'route' => route('sistem-informasi-aims-pet'),
                'active' => request()->routeIs('sistem-informasi-aims-pet'),
            ],
            [
                'title' => 'Status PLO PET',
                'route' => route('status-plo-pet'),
                'active' => request()->routeIs('status-plo-pet'),
            ],
            [
                'title' => 'SAP Asset PET',
                'route' => route('sap-asset-pet'),
                'active' => request()->routeIs('sap-asset-pet'),
            ],


        ];
        return view('SHIML.InputDataMonev.Pet.StatusPloPet', compact('tabs'));
    }

    public function store(StatusPloPetRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = StatusPloPet::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }
    

    public function data()
    {
        $TargetPLO = StatusPloPet::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }
    public function update(StatusPloPetRequest $request, $id)
    {
        $progress = StatusPloPet::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = StatusPloPet::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
