<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MONA\Iis\SapRutinRequest;
use App\Models\MONA\Iis\SapRutin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SapRutinController extends Controller
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

        return view('MONA.IIS.SapRutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = SapRutin::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(SapRutinRequest $request)
    {
        $data = $request->validated();
        $data = SapRutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(SapRutinRequest $request, $id)
    {
        $progress = SapRutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = SapRutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
