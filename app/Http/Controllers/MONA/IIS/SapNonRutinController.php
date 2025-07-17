<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MONA\Iis\SapNonRutinRequest;
use App\Models\MONA\Iis\SapNonRutin;
use Illuminate\Http\Request;

class SapNonRutinController extends Controller
{

    public function index()
    {
        $tabs = [
            [
                'title' => 'Sap Non Rutin',
                'route' => route('sap-non-rutin'),
                'active' => request()->routeIs('sap-non-rutin'),
            ],
            [
                'title' => 'Sap Rutin',
                'route' => route('sap-rutin'),
                'active' => request()->routeIs('sap-rutin'),
            ],

        ];

        return view('MONA.IIS.SapNonRutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = SapNonRutin::select('*')
            ->select('*')
            // ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            // ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(SapNonRutinRequest $request)
    {
        $data = $request->validated();
        $data = SapNonRutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(SapNonRutinRequest $request, $id)
    {
        $progress = SapNonRutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = SapNonRutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
